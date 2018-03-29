<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\admin\models\aOrdersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="a-orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'address_street') ?>

    <?= $form->field($model, 'address_house') ?>

    <?= $form->field($model, 'address_housing') ?>

    <?= $form->field($model, 'address_office') ?>

    <?php // echo $form->field($model, 'address_phone') ?>

    <?php // echo $form->field($model, 'delivery_date') ?>

    <?php // echo $form->field($model, 'delivery_interval') ?>

    <?php // echo $form->field($model, 'delivery_status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'dropping') ?>

    <?php // echo $form->field($model, 'dropping_at') ?>

    <?php // echo $form->field($model, 'unique_code') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'google_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
