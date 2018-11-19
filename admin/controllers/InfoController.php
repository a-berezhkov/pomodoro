<?php
/**
 * Created by PhpStorm.
 * User: Ziablik
 * Date: 03.04.2018
 * Time: 15:37
 */

namespace app\admin\controllers;


use app\admin\models\DateForm;
use app\front\models\Orders;
use app\front\models\OrdersHasCart;
use app\front\models\user\Profile;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;
use app\front\models\Cart;
use yii\web\NotFoundHttpException;
use Yii;

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
    public function actionView($id){
        $modelOrder = Orders::findOne(['id'=>$id]);
        $model = OrdersHasCart::find()->select('cart_id')->where(['order_id'=>$id])->asArray()->all();
        $cartIds = ArrayHelper::getColumn($model,'cart_id');
        $cartsQuery = Cart::find()->where(['id'=>$cartIds]);
        $dataProvider = new ActiveDataProvider([
            'query' => $cartsQuery
        ]);

        return $this->render('view',[
            'dataProvider' => $dataProvider,
            'model'=>$modelOrder
        ]);

    }
    public function actionView1($id)
    {
        $model = new DateForm();
        $cart_id = OrdersHasCart::find()->asArray()->where('order_id='.$id)->one()['cart_id'];
        $profile_id = Cart::find()->asArray()->where('id='.$cart_id)->one()['profile_id'];

        if($model->load(Yii::$app->request->post()))
        {
            $summ = OrdersHasCart::sumWithDate($profile_id,$model);
            $query = OrdersHasCart::find()
                ->innerJoin('orders', 'orders.id=order_id')
                ->innerJoin('cart', 'cart.id=cart_id')
                ->innerJoin('profile', 'profile.user_id=cart.profile_id')
                ->innerJoin('orders_status', 'orders_status.id=orders.delivery_status')
                ->innerJoin('store', 'store.id=cart.id_store')
                ->where("cart.profile_id=".$profile_id." and orders.created_at BETWEEN '".$model['doDate']."' and '".$model['toDate']."'");
            $dataProvider = new ActiveDataProvider([
                'query' => $query
            ]);
            return $this->render('view',[
                'dataProvider' => $dataProvider,
                'summ' => $summ,
                'model' => $model
            ]);
        }

        $summ = OrdersHasCart::sum($profile_id);
        $query = OrdersHasCart::find()
            ->innerJoin('orders', 'orders.id=order_id')
            ->innerJoin('cart', 'cart.id=cart_id')
            ->innerJoin('profile', 'profile.user_id=cart.profile_id')
            ->innerJoin('orders_status', 'orders_status.id=orders.delivery_status')
            ->innerJoin('store', 'store.id=cart.id_store')
            ->where('cart.profile_id='.$profile_id);
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        return $this->render('view',[
            'dataProvider' => $dataProvider,
            'summ' => $summ,
            'model' => $model
        ]);
    }
}