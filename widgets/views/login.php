<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

$script = <<< JS
    $( "#registration" ).click(function() {
        $( "#auth" ).hide( "slow" );
        $( "#reg" ).show( "slow" );
    });
    $( "#authorization" ).click(function() {
        $( "#reg" ).hide( "slow" );
        $( "#auth" ).show( "slow" );
    });
JS;
$this->registerJs($script, yii\web\View::POS_READY)
?>

<?php

/**
 * Auth
 */
Modal::begin([
    'headerOptions' => ['style' => 'display:none;'],
    'id' => 'login-modal',
    'class' => '',
]);
?>
<div class="row">
    <!------------------------------------Авторизация -------------------------------------------------------------->
    <div id="auth">
        <div class="col-md-8">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'enableAjaxValidation' => true,
                'action' => ['/user/login']

            ]);
            echo $form->field($model, 'login')->textInput();
            echo $form->field($model, 'password')->passwordInput();
            echo $form->field($model, 'rememberMe')->checkbox();
            ?>

            <div class="form-group">
                <?= Html::submitButton(
                    Yii::t('user', 'Sign in'),
                    ['class' => 'btn btn-primary btn-block', 'tabindex' => '4']
                ) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

        <div class="col-md-4" style="background: black;  ">
            <? echo Html::a('Registration', null, ['class' => 'btn btn-primary', 'name' => 'Registration-button', 'id' => 'registration']); ?>
        </div>

    </div>
    <!------------------------------------Регситрация -------------------------------------------------------------->
    <div id="reg" style="display: none">
        <div class="col-md-8">

            <?php $form = ActiveForm::begin([
                'id' => 'registration-form',
                'enableAjaxValidation' => true,
                'action' => ['/user/register']

            ]); ?>

            <?= $form->field($modelRegistrationForm, 'email') ?>
            <?= $form->field($modelRegistrationForm, 'username') ?>
            <?= $form->field($modelRegistrationForm, 'password')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-success btn-block']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

        <div class="col-md-4" style="background: black;">
            <? echo Html::a('Authorization', null, ['class' => 'btn btn-primary', 'name' => 'Registration-button', 'id' => 'authorization']); ?>
        </div>
    </div>

</div>
<? Modal::end(); ?>

