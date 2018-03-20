<?php

namespace app\admin\models;

use app\front\models\Profile;
use app\front\models\Store;
use Yii;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "write_off".
 *
 * @property string $id
 * @property int $id_store
 * @property int $count_box
 * @property double $count_weight
 * @property int $in
 * @property int $out
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Profile[] $profiles
 * @property Profile[] $profiles0
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id_store', 'count_box'], 'integer'],
            [['count_weight'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['id'], 'string', 'max' => 255],
            [['in', 'out'], 'string', 'max' => 1],
            [['created_at'], 'unique'],
            [['updated_at'], 'unique'],
            [['id'], 'unique'],
            [['id_store'], 'exist', 'skipOnError' => true, 'targetClass' => Store::className(), 'targetAttribute' => ['id_store' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_store' => Yii::t('app', 'Id Store'),
            'count_box' => Yii::t('app', 'Count Box'),
            'count_weight' => Yii::t('app', 'Count Weight'),
            'in' => Yii::t('app', 'In'),
            'out' => Yii::t('app', 'Out'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profile::className(), ['created_at' => 'created_at']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfiles0()
    {
        return $this->hasMany(Profile::className(), ['created_by' => 'updated_at']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['id' => 'id_store']);
    }
}
