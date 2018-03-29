<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\admin\models\aOrders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="a-orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'address_street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_house')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_housing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_office')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'delivery_date')->textInput() ?>

    <?= $form->field($model, 'delivery_interval')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'delivery_status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'dropping')->textInput() ?>

    <?= $form->field($model, 'dropping_at')->textInput() ?>

    <?= $form->field($model, 'unique_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'google_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
