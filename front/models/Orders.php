<?php

namespace app\front\models;

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
 *
 * @property OrdersStatus $deliveryStatus
 * @property OrdersHasCart[] $ordersHasCarts
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
                'class'              => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
                'value'              => new Expression('NOW()'),
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
            [['delivery_date', 'created_at', 'created_by', 'dropping_at','comment'], 'safe'],
            [['delivery_status'], 'integer'],
            [[ 'address_street', 'address_house', 'address_housing', 'address_office', 'delivery_interval','google_id'], 'string', 'max' => 255],
            [['address_phone'], 'string', 'max' => 20],
            [['dropping'], 'string', 'max' => 1],
            [['unique_code'], 'string', 'max' => 50],
            [['unique_code'], 'unique'],
            [['delivery_status'], 'exist', 'skipOnError' => true, 'targetClass' => OrdersStatus::className(), 'targetAttribute' => ['delivery_status' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address_street' => 'Address Street',
            'address_house' => 'Address House',
            'address_housing' => 'Address Housing',
            'address_office' => 'Address Office',
            'address_phone' => 'Address Phone',
            'delivery_date' => 'Delivery Date',
            'delivery_interval' => 'Delivery Interval',
            'delivery_status' => 'Delivery Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'dropping' => 'Dropping',
            'dropping_at' => 'Dropping At',
            'unique_code' => 'Unique Code',
            'comment' => 'Comment',
            'google_id' => 'Google id',
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
     * @param int $length
     * @return string
     */
    static function generateUniqueCode(int $length = 10) : string {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
