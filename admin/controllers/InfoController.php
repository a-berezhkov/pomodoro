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
use yii\data\ArrayDataProvider;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\Controller;
use app\admin\models\aOrders;
use app\front\models\Cart;
use app\admin\models\aOrdersStatus;
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
        $cart_list = Cart::find()->asArray()->where('profile_id='.$profile_id)->all();
        $profile_name = Profile::find()->asArray()->where('user_id='.$profile_id)->one()['name'];
        $dataProvider = new ArrayDataProvider([
            'allModels' => $cart_list
        ]);
//        VarDumper::dump($data_provider,10,true);
        return $this->render('view',[
            'dataProvider' => $dataProvider,
            'profile_name' => $profile_name

        ]);

//        $model = OrdersHasCart::find()->asArray()->where('order_id='.$id)->one();
//        VarDumper::dump($cart_id,10,true);
    }
}