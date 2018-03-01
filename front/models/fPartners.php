<?php

namespace app\front\models;

use Yii;

/**
 * This is the model class for table "partners".
 *
 * @property int $id
 * @property string $title
 * @property int $image_id
 * @property string $url
 */
class fPartners extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partners';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image_id'], 'integer'],
            [['title', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => \Yii::t('app', 'Title of partners'),
            'image_id' => \Yii::t('app', 'Image of partners'),
            'url' => \Yii::t('app', 'Url of partners'),
        ];
    }

    public static function getAll()
    {
        return fPartners::find()->all();
    }
}
