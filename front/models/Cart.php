<?php

namespace app\front\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property int $id
 * @property int $id_store Товар
 * @property int $count Количество ящиков
 * @property double $sum Сумма
 * @property int $is_sale По акции? (для аналитики)
 * @property int $profile_id
 * @property string $created_at
 * @property string $updated_at
 * @property int $updated_by
 * @property int $confirm Подтвержден ли заказ
 *
 * @property Profile $profile
 * @property Profile $updatedBy
 * @property Store $store
 * @property OrdersHasCart[] $ordersHasCarts
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_store', 'count', 'profile_id', 'updated_by'], 'integer'],
            [['count', 'sum', 'is_sale', 'profile_id', 'created_at', 'updated_at'], 'required'],
            [['sum'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['is_sale', 'confirm'], 'string', 'max' => 1],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['profile_id' => 'user_id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['updated_by' => 'user_id']],
            [['id_store'], 'exist', 'skipOnError' => true, 'targetClass' => Store::className(), 'targetAttribute' => ['id_store' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_store' => 'Id Store',
            'count' => 'Count',
            'sum' => 'Sum',
            'is_sale' => 'Is Sale',
            'profile_id' => 'Profile ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'confirm' => 'Confirm',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'profile_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['id' => 'id_store']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersHasCarts()
    {
        return $this->hasMany(OrdersHasCart::className(), ['cart_id' => 'id']);
    }
}
