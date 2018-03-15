<?php

namespace app\widgets;

use app\front\models\User;
use dektrium\user\models\RegistrationForm;
use Yii;
use yii\base\Widget;
use app\front\models\LoginForm;

class LoginFormWidget extends Widget{

    public function run() {
        if (Yii::$app->user->isGuest) {
            $modelLoginForm = new LoginForm();
            $modelRegistrationForm = new RegistrationForm();
            return $this->render('login', [
               'model' => $modelLoginForm,
               'modelRegistrationForm' => $modelRegistrationForm,
            ]);
        } else {
            return ;
        }
    }

}