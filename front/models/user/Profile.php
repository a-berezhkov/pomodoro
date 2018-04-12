<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 14.08.2017
 * Time: 0:51
 */
namespace app\front\models\user;

use Yii;

class Profile extends \dektrium\user\models\Profile
{

    /**
     * Extend rules of dectrium/user/Profile model
     * @return array
     */
    public function rules()
    {

        $rules = parent::rules();
        $newRules = [
            'surname' => ['surname', 'string', 'max' => 255],
            'middlename' => ['middlename', 'string', 'max' => 255],
            'phone' => ['phone', 'string', 'max' => 100],
            'inn' => ['inn', 'integer', 'max' => 11],
            'company_name' => ['company_name', 'string', 'max' => 255],
            'address_city' => ['address_city', 'string', 'max' => 255],
            'address_street' => ['address_street', 'string', 'max' => 255],
            'address_house' => ['address_house', 'integer'],
            'address_housing' => ['address_housing', 'string', 'max' => 10],
            'address_office' => ['address_office', 'string', 'max' => 10],


        ];
        return array_merge($rules, $newRules);

    }

    /**
     * Extend attribute labels of dectrium/user/Profile model
     * @return array
     */
    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();
        $newattributeLabels = [
            'surname' => \Yii::t('profile', 'surname'),
            'middlename' => \Yii::t('profile', 'middlename'),
            'birth_date' => 'Дата рождения',
            'inn' => 'ИНН',
            'company_name' => 'Название компании',

            'address_city' => 'Город',
            'address_street' => 'Улица',
            'address_house' => 'Дом',
            'address_housing' => 'Строение',
            'address_office' => 'Офис (квартира)',
        ];
        return array_merge($attributeLabels, $newattributeLabels);
    }


    /**
     * @param $role
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function findAllByRole($role)
    {
        return static::find()
                     ->join('LEFT JOIN','auth_assignment','auth_assignment.user_id = profile.user_id')
                     ->where(['auth_assignment.item_name' => $role])
                     ->all();
    }

	/**
	 * Make full name of user, lilke Surname Name Middlename
	 * @return string
	 */
	public function getFullName()
	{
		return $this->surname . " " . $this->name . " " .$this->middlename ;
	}
}