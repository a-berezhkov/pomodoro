<?php
namespace app\front\models\user;

use Yii;
use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use dektrium\user\models\User as BaseUser;
use dektrium\user\models\Profile as BaseProfile;
class RegistrationForm extends BaseRegistrationForm
{
    public function rules()
    {
        $rules = parent::rules();
        unset($rules['usernameRequired']);
        return $rules;
    }
    public function loadAttributes(BaseUser $user)
    {
        $user->setAttributes([
            'email' => $this->email,
            'username' => $this->email,
            'password' => $this->password,
        ]);
        $profile = \Yii::createObject(BaseProfile::className());
        $user->setProfile($profile);
    }
}