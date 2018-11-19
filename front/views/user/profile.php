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
use yii\widgets\ActiveForm;


/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var \app\front\models\user\Profile $model
 */

$this->title                   = Yii::t('user', 'Profile settings');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="page page-personal">
    <div class="row">
        <div class="col-md-3">
            <?= $this->render('_menu') ?>
        </div>
        <div class="col-md-9">
            <div class="form bordered">

                <h2 class="title">Информация</h2>

                <?php $form = ActiveForm::begin([
                    'id'      => 'profile-form',
                    'options' => ['class' => ''],

                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                    'validateOnBlur'         => false,
                ]); ?>

                <!------------------------------------------user photo --------------------------------------------------------------------->
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'surname')->textInput(['placeholder' => 'Фамилия *'])->label
                        (false) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'name')->textInput(['placeholder' => 'Имя *'])->label
                        (false) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'middlename')->textInput(['placeholder' => 'Отчество'])->label
                        (false) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'company_name')->textInput(['placeholder' => 'Название организации *'])->label
                        (false) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'inn')->textInput(['placeholder' => 'ИНН *'])->label
                        (false) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'kpp')->textInput(['placeholder' => 'КПП'])->label
                        (false) ?>
                    </div>
                </div>


                <h2 class="title">Адрес доставки</h2>

                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'address_city')->textInput(['placeholder' => 'Город *'])->label
                        (false) ?>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'address_street')->textInput(['placeholder' => 'Улица *'])->label
                            (false) ?>
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($model, 'address_house')->textInput(['placeholder' => 'Дом *'])->label
                            (false) ?>
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($model, 'address_housing')->textInput(['placeholder' => 'Корпус *'])
                                                                       ->label
                            (false) ?>
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($model, 'address_office')->textInput(['placeholder' => 'Офис *'])->label
                            (false) ?>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                                    'mask' => '+7 (999)-999-9999',
                                    'options' => ['placeholder' => 'Контактный телефон *','class' => 'form-control']
                                ])->label(false) ?>
                            </div>
                        </div>


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
