<?php


namespace app\front\controllers;


use app\front\models\Cart;
use app\front\models\Orders;
use app\front\models\OrdersHasCart;
use app\front\models\Store;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\View;

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
            $storeItems = $_SESSION['store'];

            $model->save();


            foreach ($storeItems as $item) {
                $cart = new Cart();
                $modelOrdersHasCart = new OrdersHasCart();
                /**
                 * @var $id Store id
                 * @var $count Store items
                 */
                $id = $item['data']['id'];
                $count = $item['count'];
                // Аттребуты Cart()
                $cart->id_store = $id;
                $cart->count = $count;
                $cart->sum = $count * ($item['item_discount_box_price'] ? $item['item_discount_box_price'] : $item['item_box_price']);
                $cart->confirm = false;
                $cart->is_sale = $item['item_discount_box_price'] ? true : false;

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
            return $this->redirect(['payment']);

        }
        ///   todo something

    }

    public function actionPayment()
    {
        return $this->render('/user/payment');
    }
}