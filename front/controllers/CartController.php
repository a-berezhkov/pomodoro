<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 15.03.2018
 * Time: 13:33
 */

namespace app\front\controllers;


use app\front\models\Orders;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\Response;

class CartController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['delivery'],
                'rules' => [

                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],

        ];
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

            $session = \Yii::$app->session;
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
          if ($_POST['data']){
              $_SESSION['store'] = $_POST['data'];
              return true;
          } else {
              return false;
          }
        } else {
            isset($_SESSION['store']) ? $items = $_SESSION['store'] : $items = [];

          return $this->render('/user/cart', ['items' => $items]);
        }
    }

    /**
     * @return string
     */
    public function actionDelivery()
    {
        $model = new Orders();
        return $this->render('/user/delivery', ['model' => $model]);
    }

    /***
     * @return string
     */
    public function actionCheckout()
    {
        $items = $_SESSION['store'];
        return $this->render('checkout', ['items' => $items]);

    }

    /**
     * @return string
     */
    public function actionPayment()
    {
        return $this->render('/user/payment');
    }
}