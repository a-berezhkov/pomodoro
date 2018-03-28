<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="write-off create form">
    <?php $form=ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_store')->textInput() ?>

    <?= $form->field($model,'count_box')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>