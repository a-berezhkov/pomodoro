<?php
/**
 * Created by PhpStorm.
 * User: Ziablik
 * Date: 03.04.2018
 * Time: 15:37
 */

namespace app\admin\controllers;


use app\front\models\OrdersHasCart;
use app\front\models\user\Profile;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\Controller;
use app\front\models\Cart;
use yii\web\NotFoundHttpException;

class InfoController extends Controller
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
        ];
    }

    public function actionView($id)
    {
        $cart_id = OrdersHasCart::find()->asArray()->where('order_id='.$id)->one()['cart_id'];
        $profile_id = Cart::find()->asArray()->where('id='.$cart_id)->one()['profile_id'];
        $query = OrdersHasCart::find()
            ->innerJoin('orders', 'orders.id=order_id')
            ->innerJoin('cart', 'cart.id=cart_id')
            ->innerJoin('profile', 'profile.user_id=cart.profile_id')
            ->innerJoin('orders_status', 'orders_status.id=orders.delivery_status')
            ->where('cart.profile_id='.$profile_id);
        $profile_name = Profile::find()->asArray()->where('user_id='.$profile_id)->one()['name'];
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
        return $this->render('view',[
            'dataProvider' => $dataProvider,

        ]);
    }
}