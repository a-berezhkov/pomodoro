<?php

namespace app\admin\models;

use Yii;
use app\front\models\user\Profile;
use app\front\models\Store;
use yii\helpers\VarDumper;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "write_off".
 *
 * @property int $id
 * @property int $id_store
 * @property int $count_box
 * @property double $count_weight
 * @property int $in
 * @property int $out
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Profile $updatedBy
 * @property Profile $createdBy
 * @property Store $store
 */
class WriteOff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'write_off';
    }

    public function behaviors()
    {
        return [
            [
                'class'              => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value'              => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',

            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_store', 'count_box', 'created_by', 'updated_by'], 'integer'],
            [['count_weight'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['in', 'out'], 'string', 'max' => 1],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['updated_by' => 'user_id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['created_by' => 'user_id']],
            [['id_store'], 'exist', 'skipOnError' => true, 'targetClass' => Store::className(), 'targetAttribute' => ['id_store' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('app', 'ID'),
            'id_store' => \Yii::t('app', 'Id Store'),
            'count_box' => \Yii::t('app', 'Count Box'),
            'count_weight' => \Yii::t('app', 'Count Weight'),
            'in' => \Yii::t('app', 'In'),
            'out' => \Yii::t('app', 'Out'),
            'created_at' => \Yii::t('app', 'Created At'),
            'updated_at' => \Yii::t('app', 'Updated At'),
            'created_by' => \Yii::t('app', 'Created By'),
            'updated_by' => \Yii::t('app', 'Updated By'),
        ];
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
    public function getCreatedBy()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['id' => 'id_store']);
    }

    //проверка существования нужного колличества коробок
    public function validateBoxCount()
    {
        $storeBox = Store::find()->where(['id' => $this->id_store])->one();
        if($this->count_box > $storeBox->boxes_count)
        {
            return false;
        }
        else return true;
    }

    public function saveParams()
    {
        $store = Store::find()->where(['id' => $this->id_store])->one();
        $this->count_weight = $this->count_box * $store->box_weight;
        $store->boxes_count = $store->boxes_count - $this->count_box;
        $this->save();
        $store->save();
    }
}
