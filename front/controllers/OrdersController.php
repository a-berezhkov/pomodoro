<?php

declare(strict_types=1);
namespace app\front\controllers;



use app\front\models\{OrdersHasCart,Store,Orders,Cart};
use yii\data\ActiveDataProvider;
use yii\helpers\Json;
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

                $cart               = new Cart();
                $modelOrdersHasCart = new OrdersHasCart();
                /**
                 * @var $id Store id
                 * @var $count Store items
                 */
                  $id    = $item['id'];
                  $count = $item['count_box'];
                // Аттребуты Cart()
                $cart->id_store = $id;
                $cart->count    = $count;
                $cart->sum      = $count * ($item['item_discount_box_price'] ? $item['item_discount_box_price'] : $item['item_box_price']);
                $cart->confirm  = false;
                $cart->is_sale  = $item['item_discount_box_price'] ? true : false;

                if ($cart->save()) {
                    /**
                     * Сохраняем связь много-ко-многим
                     */
                    $modelOrdersHasCart->cart_id  = $cart->id;
                    $modelOrdersHasCart->order_id = $model->id;
                    if ($modelOrdersHasCart->save()) {
                        $store             = Store::itemSell($id, $count); // списываем товар со склада


                        $session = \Yii::$app->session;
                        $session->open();
                        $_SESSION['delivery'] = $model->id; //флаг, что у нас уже есть заказ

                    }
                }
            }
         return $this->redirect(['/front/cart/payment','id'=>$model->id]);

        }
        ///   todo something

    }


    /**
     * @return string
     */
    public function actionUserOrders()
    {
        $userId     = \Yii::$app->user->id;
        $userOrders = new ActiveDataProvider([
            'query'      => Orders::find()->andWhere(['created_by' => $userId]),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('/user/orders',['userOrders'=>$userOrders]);

    }

}