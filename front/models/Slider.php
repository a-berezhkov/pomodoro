<?php

namespace app\front\models;

use noam148\imagemanager\models\ImageManager;
use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property string $id
 * @property string $title Заголовок
 * @property int $image_id Фотография
 * @property string $desc Описание
 * @property string $button_url
 * @property int $order
 * @property int $store_id
 *
 * @property ImageManager $image
 * @property Store $store
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title','image_id'], 'required'],
            [['image_id', 'order', 'store_id'], 'integer'],
            [['title', 'desc', 'button_url'], 'string', 'max' => 255],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => ImageManager::className(), 'targetAttribute' => ['image_id' => 'id']],
            [['store_id'], 'exist', 'skipOnError' => true, 'targetClass' => Store::className(), 'targetAttribute' => ['store_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'title' => 'Название',
            'image_id' => 'Картинка',
            'desc' => 'Описнаие',
            'button_url' => 'Адрес ссылки ',
            'order' => 'Порядок',
            'store_id' => 'Товар',
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
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['id' => 'store_id']);
    }
}
