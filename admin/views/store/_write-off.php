<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\admin\models\aStore;

?>
<div class="write-off create form">
    <?php $form=ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_store')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(aStore::find()->all(),'id','name'),
    'language' => 'ru',
    'options' => ['placeholder' => 'Выберите товар ....'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>

    <?= $form->field($model,'count_box')->textInput() ?>

    <?= $form->field($model,'out')->checkbox() ?>

    <?= $form->field($model,'in')->checkbox() ?>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>