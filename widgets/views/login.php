<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//use yii\bootstrap\Modal;
use app\widgets\CustomModal;

$script = <<< JS
    $( "#registration" ).click(function() {
        $( "#auth" ).slideUp( "slow" );
        $( "#reg" ).slideDown( "slow" );
    });
    $( "#authorization" ).click(function() {
        $( "#reg" ).slideUp( "slow" );
        $( "#auth" ).slideDown( "slow" );
    });
JS;
$this->registerJs($script, yii\web\View::POS_READY)
?>

<?php

/**
 * Auth
 */
CustomModal::begin([
    //'header' => null,
    'id' => 'login-modal',
    //'class' => '',
]);
?>
<div class="row equal">
    <!------------------------------------Авторизация -------------------------------------------------------------->
    <div id="auth">
        <div class="col-md-8 main">

            <h1 class="title">Вход</h1>

            <div class="content">
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'enableAjaxValidation' => true,
                    'action' => ['/user/login']

                ]);
                ?>
                <?php
                echo $form->field($model, 'login')->textInput(['placeholder' => $model->getAttributeLabel('email')])->label(false);
                echo $form->field($model, 'password')->passwordInput(['placeholder' => $model->getAttributeLabel('password')])->label(false);
                ?>
            </div>

            <div class="form-group text-right">
                <?= Html::submitButton(
                    'Войти',
                    ['class' => 'btn button button-action button-primary', 'tabindex' => '4']
                ) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

        <div class="col-md-4 sub">
            <h2 class="title">Вы у нас в первый раз?</h2>
            <div class="content">
                <p>Зарегистрируйтесь на нашем сайте и получите уникальную возможность делать оптовые закупки для своей компании.</p>
            </div>
            <? echo Html::a('Регистрация', null, ['class' => 'btn button-bordered', 'name' => 'Registration-button', 'id' => 'registration']); ?>
        </div>

    </div>
    <!------------------------------------Регситрация -------------------------------------------------------------->
    <div id="reg">
        <div class="col-md-8 main">

            <h1 class="title">Регистрация</h1>

            <div class="content">
                <?php $form = ActiveForm::begin([
                    'id' => 'registration-form',
                    'enableAjaxValidation' => true,
                    'action' => ['/user/register']

                ]); ?>

                <?= $form->field($modelRegistrationForm, 'email')->textInput(['placeholder' => $model->getAttributeLabel('email')])->label(false) ?>
                <?//= $form->field($modelRegistrationForm, 'username')->label(false) ?>
                <?= $form->field($modelRegistrationForm, 'password')->passwordInput(['placeholder' => $model->getAttributeLabel('password')])->label(false) ?>

            </div>

            <div class="form-group text-right">
                <?= Html::submitButton('Регистрация', ['class' => 'btn button button-action button-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

        <div class="col-md-4 sub">
            <h2 class="title">Вход</h2>
            <div class="content">
                <p>А может Вы уже зарегистрировались на нашем портале? Тогда смелее нажимайте на кнопку «войти».</p>
            </div>

            <? echo Html::a('Войти', null, ['class' => 'btn button-bordered input-block-level', 'name' => 'Registration-button', 'id' => 'authorization']); ?>
        </div>
    </div>

</div>
<? CustomModal::end(); ?>

