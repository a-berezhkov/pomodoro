<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 15.03.2018
 * Time: 13:33
 */

namespace app\front\controllers;


use yii\web\Controller;
use yii\web\Response;

class CartController extends Controller
{
    /**
     * Магия
     * Метод принимает параметры ajax и заносит их в сессию
     * @example of ajax in
     * "store":{
     *      "1":{
     *          "data":{
     *              "id":"1",
     *              "item_name":"1",
     *              "item_box_price":"7640.00",
     *              "item_box_weight":"20",
     *              "item_discount_box_price":"6940"
     *              "item_image_link":"/web/assets/images/fc/fc3297_store--.png"
     *          },
     *          "count":2  // количество товаров
     *          },
     *      "2":{ ... }
     *      }
     * }
     * @see https://yiiframework.com.ua/ru/doc/guide/2/runtime-sessions-cookies/#access-session-data
     * @return mixed|\yii\web\Session
     */
    public function actionAdd()
    {
        /*
         * @see https://yiiframework.com.ua/ru/doc/guide/2/runtime-sessions-cookies/#access-session-data
         * следующий код НЕ БУДЕТ работать
         * $session['captcha']['number'] = 5;
         * $session['captcha']['lifetime'] = 3600;
         */

        if (\Yii::$app->request->isAjax) {
            // id товара (store)
            $id_store = \Yii::$app->request->post('id');
            //Если нет $id_store то слздается пустой объект и он отображаетя как товар
            //  'store' => [
            //      '' => [
            //              'data' => []
            //              ]
            //              ]
            if ($id_store) {
                $session = \Yii::$app->session;
                $session->open();
                //Заносим все прешедшие данные ajax в массив
                $_SESSION['store'][$id_store]['data'] = \Yii::$app->request->post();


                // Если товар уже есть в сесии увеличиваем его количствео на 1
                if (isset($_SESSION['store'][$id_store])) {
                    $_SESSION['store'][$id_store]['count']++;
                } else {
                    $_SESSION['store'][$id_store]['count'] = 0;
                }

                $session->close();
                \Yii::$app->response->format = Response::FORMAT_JSON;
                return $session;
            }
        }
    }

    /**
     * Метод возыращается сессию
     * @return mixed|\yii\web\Session
     *
     */
    public function actionStoresBySession()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        if (\Yii::$app->request->isAjax) {

            $session                     = \Yii::$app->session;
            return $session;
        } else {

            return null;
        }


    }

    /**
     * Метод для отображения коризины товаров
     * @return bool|string
     */
    public function actionCart()
    {
        if (\Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            if (isset($_SESSION['store'])) {
                return $this->renderAjax('_menu_drop_cart');
            } else {
                return false;
            }
        } else {
            $items = $_SESSION['store'];
            return $this->render('/user/cart',['items'=>$items]);
        }
    }
    public function actionDelivery(){
        return $this->render('/user/delivery',['items'=>$items]);
    }


    /**
     *
     */
    public function actionCheckout(){
        $items = $_SESSION['store'];
        return $this->render('checkout',['items'=>$items]);

    }
}