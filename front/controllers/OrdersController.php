<?php

declare(strict_types=1);

namespace app\front\controllers;


use app\front\models\{
    OrdersHasCart, Store, Orders, Cart
};
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Controller;

class OrdersController extends Controller
{

    /**
     * Метод формирвоания заказа
     * Получает данные товаров в корзине из сессии $_SESSION['store']
     * Сохраняет данные заказа, полученные из формы user/delivery.php
     * Сохраняет текущую корзину в базу данных TODO вынести в отдельный метод
     * Сохранет много-многим между товарами из корзины и закзом
     * Списывает количество о склада
     *
     * @return \yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Orders();
        if ($model->load(\Yii::$app->request->post())) {
            $model->unique_code = Orders::generateUniqueCode(10);
            $unDecodedCartItems = Json::decode(\Yii::$app->request->post('cart-items'));
            foreach ($unDecodedCartItems as $key => $unDecodedCartItem) {
                $unDecodedCartItems[$key] = Json::decode($unDecodedCartItem);
            }

            $model->save();

            foreach ($unDecodedCartItems as $item) {

                $cart = new Cart();
                $modelOrdersHasCart = new OrdersHasCart();
                /**
                 * @var $id Store id
                 * @var $count Store items
                 */
                $id = $item['id'];
                $count = $item['count_box'];
                // Аттребуты Cart()
                $cart->id_store = $id;
                $cart->count = $count;
                $cart->sum = $count * ($item['item_discount_box_price'] ? $item['item_discount_box_price'] : $item['item_box_price']);
                $cart->confirm = false;
                $cart->is_sale =   ($item['item_discount_box_price']=='1') ? true : false;

                if ($cart->save()) {
                    /**
                     * Сохраняем связь много-ко-многим
                     */
                    $modelOrdersHasCart->cart_id = $cart->id;
                    $modelOrdersHasCart->order_id = $model->id;
                    if ($modelOrdersHasCart->save()) {
                        $store = Store::itemSell($id, $count); // списываем товар со склада



                    }
                }
            }

            return $this->redirect(['/front/cart/payment', 'id' => $model->id]);
        }
        return $this->render(['/front/cart/delivery', 'model' => $model ]);

    }


    /**
     * @return string
     */
    public function actionUserOrders()
    {
        $userId = \Yii::$app->user->id;
        $userOrders = new ActiveDataProvider([
            'query' => Orders::find()->andWhere(['created_by' => $userId]),
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => ['defaultOrder' => [
                'created_at' => SORT_DESC,

            ]
            ]
        ]);
        return $this->render('/user/orders', ['userOrders' => $userOrders]);

    }

    /**
     * Функция возвращает объект заказа
     * @param int|null $id
     * @param string|null $code
     * @return string
     */
    public function actionViewOrder(int $id=null,string $code = null){
        $model = Orders::find()->andWhere(['or',
                                           ['id'=>$id],
                                           ['unique_code'=>$code]
        ])->one();
        return $this->render('/default/order-view',['model'=>$model]);
    }

    public function actionDropOrder($id){
        $model = Orders::findOne(['id'=>$id]);
        $model->dropping = true;
        $model->delivery_status = 6;
        $model->dropping_at = new Expression('NOW()');
        if($model->save()){
            \Yii::$app->session->setFlash('success', 'Заказ ', $model->id , ' отменен');
            return $this->redirect(Url::toRoute('/front/orders/user-orders'));
        }
        else {
            VarDumper::dump($model->errors);
        }
    }

}