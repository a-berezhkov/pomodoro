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
    public $session;

    public function init()
    {
        $this->session = \Yii::$app->session;
        $this->session->open();
    }

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
        $_SESSION['cart'] = false;
        return $this->render('/user/cart');

    }

    /**
     * @return string
     */
    public function actionDelivery($orderId = null)
    {
        if ($orderId) {
            $model = Orders::findOne(['id' => $orderId]);
            return $this->render('/user/delivery', ['model' => $model]);
        } else {
            $model = new Orders();
            return $this->render('/user/delivery', ['model' => $model]);
        }

    }


    /**
     * @return string
     */
    public function actionPayment($id = null, $Orders = null)
    {
        if ($id == null) {
            \Yii::$app->session->setFlash('danger', 'Вы не указали адрес доставки');
            $model = new Orders();
            return $this->render('/user/delivery', ['model' => $model]);
        }
        $model = Orders::findOne(['id' => $id]);

        if (\Yii::$app->request->post('payment')) {
            $model->payment = \Yii::$app->request->post('payment');
            $model->save();
            return $this->render('/user/confirm', [
                'model' => $model
            ]);
        } else {
            return $this->render('/user/payment', [
                'model' => $model
            ]);

        }

    }
}