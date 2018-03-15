<?php

namespace app\front\models;

use app\models\Profile;
use app\front\models\User;
use noam148\imagemanager\models\ImageManager;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "store".
 *
 * @property int $id
 * @property string $name Название товара
 * @property int $boxes_count Количество оставшихся коробок
 * @property double $box_weight Вес одной коробки
 * @property string $box_price Цена за одну коробку
 * @property string $desc Описание товара
 * @property int $logo_id Логотип товара
 * @property int $country_id Страна происхождения 
 * @property int $category_id Категория 
 * @property int $is_sale Распродажа?
 * @property int $is_active Активно?
 * @property int $created_by Автор записи
 * @property int $updated_by Последнее изменение записи
 * @property string $created_at Запись создана 
 * @property string $updated_at Запись обновлена
 * @property float $discount_box_price
 *
 * @property ImageManager $logo
 * @property Categories $category
 * @property Countries $country
 * @property Images $logo0
 * @property User $createdBy
 * @property User $updatedBy
 */
class Store extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store';
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
            [['name', 'category_id'], 'required'],
            [['boxes_count', 'logo_id', 'country_id', 'category_id', 'created_by', 'updated_by'], 'integer'],
            [['box_weight', 'box_price','discount_box_price'], 'number'],
            [['desc'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['is_sale', 'is_active'], 'string', 'max' => 1],
            [['logo_id'], 'exist', 'skipOnError' => true, 'targetClass' => ImageManager::className(), 'targetAttribute' => ['logo_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Countries::className(), 'targetAttribute' => ['country_id' => 'id']],
             [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
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
            'boxes_count' => Yii::t('app', 'Boxes Count'),
            'box_weight' => Yii::t('app', 'Box Weight'),
            'box_price' => Yii::t('app', 'Box Price'),
            'desc' => Yii::t('app', 'Desc'),
            'logo_id' => Yii::t('app', 'Logo ID'),
            'country_id' => Yii::t('app', 'Country ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'is_sale' => Yii::t('app', 'Is Sale'),
            'is_active' => Yii::t('app', 'Is Active'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'discount_box_price' => Yii::t('app', 'Discount box price'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogo()
    {
        return $this->hasOne(ImageManager::className(), ['id' => 'logo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Countries::className(), ['id' => 'country_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getProfile()
	{
		return $this->hasOne(\app\front\models\Profile::className(), ['user_id' => 'updated_by']);
	}
}
