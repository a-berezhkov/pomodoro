<?php

namespace app\front\models;

use Yii;

/**
 * This is the model class for table "orders_has_cart".
 *
 * @property int $id
 * @property int $order_id
 * @property int $cart_id
 *
 * @property Cart $cart
 * @property Orders $order
 */
class OrdersHasCart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders_has_cart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'cart_id'], 'required'],
            [['order_id', 'cart_id'], 'integer'],
            [['cart_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cart::className(), 'targetAttribute' => ['cart_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'cart_id' => 'Cart ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCart()
    {
        return $this->hasOne(Cart::className(), ['id' => 'cart_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['id' => 'order_id']);
    }

    public static function sum($profile_id)
    {
        $query = OrdersHasCart::find()
            ->innerJoin('orders', 'orders.id=order_id')
            ->innerJoin('cart', 'cart.id=cart_id')
            ->innerJoin('profile', 'profile.user_id=cart.profile_id')
            ->innerJoin('orders_status', 'orders_status.id=orders.delivery_status')
            ->innerJoin('store', 'store.id=cart.id_store')
            ->where('cart.profile_id='.$profile_id);
        $summ = 0;
        $cart_list = $query
            ->asArray()
            ->select('cart.sum')
            ->all();
        foreach ($cart_list as $item)
        {
            $summ = $summ + $item['sum'];
        }
        return $summ;
    }

    public static function sumWithDate($profile_id,$model)
    {
        $query = OrdersHasCart::find()
            ->innerJoin('orders', 'orders.id=order_id')
            ->innerJoin('cart', 'cart.id=cart_id')
            ->innerJoin('profile', 'profile.user_id=cart.profile_id')
            ->innerJoin('orders_status', 'orders_status.id=orders.delivery_status')
            ->innerJoin('store', 'store.id=cart.id_store')
            ->where("cart.profile_id=".$profile_id." and orders.created_at BETWEEN '".$model['doDate']."' and '".$model['toDate']."'");
        $summ = 0;
        $cart_list = $query
            ->asArray()
            ->select('cart.sum')
            ->all();
        foreach ($cart_list as $item)
        {
            $summ = $summ + $item['sum'];
        }
        return $summ;
    }
}
