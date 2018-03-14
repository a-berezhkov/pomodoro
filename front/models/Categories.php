<?php

namespace app\front\models;

use noam148\imagemanager\models\ImageManager;
use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $name Название категории товаров
 * @property int $image_id
 * @property string $icon
 *
 * @property ImageManager $image
 * @property Store[] $stores
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['image_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['icon'], 'string', 'max' => 255],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => ImageManager::className(), 'targetAttribute' => ['image_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'image_id' => Yii::t('app', 'Image'),
            'icon' => Yii::t('app', 'Icon class'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(ImageManager::className(), ['id' => 'image_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStores()
    {
        return $this->hasMany(Store::className(), ['category_id' => 'id']);
    }
}
