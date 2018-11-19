<?php

namespace app\front\models;

use app\front\models\user\Profile;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $address_street Улица
 * @property string $address_house Дом
 * @property string $address_housing Корпус
 * @property string $address_office
 * @property string $address_phone
 * @property string $delivery_date Дата доставки
 * @property string $delivery_interval Интервал доставки
 * @property int $delivery_status
 * @property string $created_at
 * @property string $created_by
 * @property int $dropping
 * @property string $dropping_at
 * @property string $unique_code
 * @property string $comment
 * @property string $google_id
 * @property string $payment
 * @property int $sum_order
 *
 * @property OrdersStatus $deliveryStatus
 * @property OrdersHasCart[] $ordersHasCarts
 * @property Profile[] $profile
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => false,

            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['delivery_date', 'delivery_interval'], 'required'],
            [['created_at', 'created_by', 'dropping_at', 'comment'], 'safe'],
            [['delivery_status','sum_order'], 'integer'],
            [['address_street', 'address_house', 'address_housing', 'address_office', 'delivery_interval', 'google_id', 'payment'], 'string', 'max' => 255],
            [['address_phone'], 'string', 'max' => 20],
            [['dropping'], 'boolean'],
            [['unique_code'], 'string', 'max' => 50],
            [['unique_code'], 'unique'],
            [['delivery_status'], 'exist', 'skipOnError' => true, 'targetClass' => OrdersStatus::className(), 'targetAttribute' => ['delivery_status' => 'id']],
            ['google_id', 'required', 'when' => function ($model) {
                return $model->address_street == '';
            }, 'whenClient' => 'function (attribute, value) {
        return $("#orders-address_street").val() == "";
    }', 'message' => 'Заполните поле Адрес с помощью автоматического подбора либо укажите вручную'],

            ['address_street', 'required', 'when' => function ($model) {
                return $model->google_id == '';
            }, 'whenClient' => 'function (attribute, value) {
        return $("#orders-google_id").val() == "";
    }', 'message' => 'Заполните поле Адрес с помощью автоматического подбора либо укажите вручную']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address_street' => 'Улица',
            'address_house' => 'Дом',
            'address_housing' => 'Строение',
            'address_office' => 'Офис/квартира',
            'address_phone' => 'Телефон',
            'delivery_date' => 'Дата доставки',
            'delivery_interval' => 'Интервал доставки',
            'delivery_status' => 'Статус заказа',
            'created_at' => 'Запись добавлена',
            'created_by' => 'Автор записи',
            'dropping' => 'Отказ',
            'dropping_at' => 'Время отказа',
            'unique_code' => 'Унникальный код',
            'comment' => 'Комментарий',
            'google_id' => 'Google id',
            'Payment' => 'Метод оплаты',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveryStatus()
    {
        return $this->hasOne(OrdersStatus::className(), ['id' => 'delivery_status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersHasCarts()
    {
        return $this->hasMany(OrdersHasCart::className(), ['order_id' => 'id']);
    }

    /**
     * Метод вовзращает все товары из заказа
     * @return \yii\db\ActiveQuery
     */
    public function getCarts(){
        return $this->hasMany(Cart::className(), ['id' => 'cart_id'])
                    ->viaTable('orders_has_cart', ['order_id' => 'id']);
    }
    /**
     * @param int $length
     * @return string
     */
    static function generateUniqueCode(int $length = 10): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'created_by']);
    }
}
