<?php

use app\admin\models\aCategories;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\admin\models\aSlider */
/* @var $form yii\widgets\ActiveForm */

$script  = <<< JS
$('#aslider-title, #aslider-desc').change(function () {
    /**
     * Присваимваем скрытому полю aslider-desc-hidden значение
     * и делаем поле aslider-desc неактивным
     */
    $('#aslider-desc-hidden').val($('#aslider-desc').val());

    /**
     * Делам поле select неактивным, так как товара с таким именем 
     * или описанием нет и ставим сслку на товар null
     */
    $('select').select2("enable",false);
    $('select').select2("val",0);
    $('#aslider-store_id-hidden').val(null);

});     
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);
?>

<div class="a-slider-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'title')->hiddenInput(['id' => 'aslider-title-hidden'])->label(false)->error
            (false) ?>

            <?= $form->field($model, 'image_id')->widget(\noam148\imagemanager\components\ImageManagerInputWidget::className(), [
                'aspectRatio'                  => (16 / 9), //set the aspect ratio
                'cropViewMode'                 => 1,
                //crop mode, option info: https://github.com/fengyuanchen/cropper/#viewmode
                'showPreview'                  => true, //false to hide the preview
                'showDeletePickedImageConfirm' => false, //on true show warning before detach image
            ]); ?>

            <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'desc')->hiddenInput(['id' => 'aslider-desc-hidden'])->label(false) ?>

            <?= $form->field($model, 'button_url')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'order')->hiddenInput()->label(false) ?>


        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'store_id')->widget(Select2::classname(), [
                'data'          => aCategories::getListStores(),
                'id'            => 'store_item',
                'options'       => ['placeholder' => Yii::t('app', 'Select goods... ')],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
                'pluginEvents'  => [
                    "select2:select" => "function () {
    var current_val = $(this).val();
    $.ajax({
        type: 'GET',
        url: '/web/admin/store/get-ajax-item',
        data: {
            id: $(this).val(),
        }
    }).done(function (data) {
        /**
         * Присваимваем скрытому полю aslider-title-hidden значение 
         * и делаем поле aslider-title неактивным 
         */
        $('#aslider-title-hidden').val(data.name);
        $('#aslider-title').val(data.name).prop('disabled', true);
        /**
         * аналогично 
         */
        $('#aslider-desc-hidden').val(data.name);
        $('#aslider-desc').val(data.desc).prop('disabled', true);
        /**
         * Присваиваем id товара 
         */
        $('#aslider-store_id-hidden').val(current_val);


    }).fail(function (jqXHR, textStatus) {
        console.log('Request failed: ' + textStatus + '<br/>' + this.url);
    });

}",
                ],
            ]); ?>
            <?= $form->field($model, 'store_id')->hiddenInput(['id' => 'aslider-store_id-hidden'])->label(false) ?>
        </div>

    </div>
    <div class="row">
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
