<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 15.03.2018
 * Time: 13:33
 */

namespace app\front\controllers;


use app\front\models\Store;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\Response;

class CartController extends Controller
{

    public function actionAdd()
    {
        /*
         *   следующий код НЕ БУДЕТ работать
         * $session['captcha']['number'] = 5;
         * $session['captcha']['lifetime'] = 3600;
         */

        if (\Yii::$app->request->isAjax) {
            $session = \Yii::$app->session;
            $id_store = \Yii::$app->request->post('id');

            $session->open();
            $_SESSION['store'][$id_store]['data'] = \Yii::$app->request->post();
            // Если товар уже есть в сесии

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

    public function actionStoresBySession()
    {
        if (\Yii::$app->request->isAjax) {
            $session = \Yii::$app->session;
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return $session;
        }


    }

    public function actionCart(){
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->renderAjax('../default/_menu_cart');
    }
}