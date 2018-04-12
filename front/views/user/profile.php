<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use dektrium\user\helpers\Timezone;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;


/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\Profile $model

 */

$this->title = Yii::t('user', 'Profile settings');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="page">
    <div class="row">
        <div class="col-md-3">
            <?= $this->render('_menu') ?>
        </div>
        <div class="col-md-9">
            <div class="form bordered">

                <h2 class="title">Информация</h2>

                <?php $form = ActiveForm::begin([
                    'id' => 'profile-form',
                    'options' => ['class' => ''],

                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                    'validateOnBlur' => false,
                ]); ?>

                <!------------------------------------------user photo --------------------------------------------------------------------->

                <?= $form->field($model, 'surname') ?>

                <?= $form->field($model, 'name') ?>

                <?= $form->field($model, 'middlename') ?>

                <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                    'mask' => '+7 (999)-999-9999',
                ]) ?>

                <?= $form->field($model, 'inn') ?>

                <?= $form->field($model, 'company_name') ?>

                <?= $form->field($model, 'address_city') ?>

                <?= $form->field($model, 'address_street') ?>

                <?= $form->field($model, 'address_house') ?>

                <?= $form->field($model, 'address_housing') ?>

                <?= $form->field($model, 'address_office') ?>






                <? // $form->field($model, 'location') ?>


                <!---->
                <!--                --><? //= $form
                //                    ->field($model, 'gravatar_email')
                //                    ->hint(Html::a(Yii::t('user', 'Change your avatar at Gravatar.com'), 'http://gravatar.com')) ?>



                <div class="form-group text-right">
                    <?= Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn button button-action']) ?>

                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
