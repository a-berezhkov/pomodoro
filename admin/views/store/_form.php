<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\front\models\Countries;
use app\front\models\Categories;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\front\models\Store */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="store-form">

	<?php $form = ActiveForm::begin(); ?>


    <div class="row">
        <div class="col-md-2">
			<?= $form->field( $model, 'is_sale' )->checkbox() ?>
        </div>
        <div class="col-md-2">
			<?= $form->field( $model, 'is_active' )->checkbox() ?>
        </div>
        <div class="col-md-8">
			<?= $form->field( $model, 'logo_id' )->widget(\noam148\imagemanager\components\ImageManagerInputWidget::className(), [
				'aspectRatio' => (16/9), //set the aspect ratio
				'cropViewMode' => 1, //crop mode, option info: https://github.com/fengyuanchen/cropper/#viewmode
				'showPreview' => true, //false to hide the preview
				'showDeletePickedImageConfirm' => false, //on true show warning before detach image
			]);?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
			<?= $form->field( $model, 'name' )->textInput( [ 'maxlength' => true ] ) ?>
        </div>
        <div class="col-md-3">

			<?= $form->field( $model, 'country_id' )->widget( Select2::classname(), [
				'data'          => ArrayHelper::map( Countries::find()->all(), 'id', 'name' ),
				'language'      => 'ru',
				'options'       => [ 'placeholder' => 'Выбрать страну.... ' ],
				'pluginOptions' => [
					'allowClear' => true
				],
			] ); ?>
        </div>
        <div class="col-md-3">
			<?= $form->field( $model, 'category_id' )->widget( Select2::classname(), [
				'data'          => ArrayHelper::map( Categories::find()->all(), 'id', 'name' ),
				'language'      => 'ru',
				'options'       => [ 'placeholder' => 'Выбрать категорию.... ' ],
				'pluginOptions' => [
					'allowClear' => true
				],
			] ); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
			<?= $form->field( $model, 'boxes_count' )->textInput() ?>
        </div>
        <div class="col-md-3">
			<?= $form->field( $model, 'box_weight' )->textInput() ?>
        </div>
        <div class="col-md-3">
			<?= $form->field( $model, 'box_price' )->textInput( [ 'maxlength' => true ] ) ?>
        </div>
        <div class="col-md-3">
			<?= $form->field( $model, 'discount_box_price' )->textInput( [ 'maxlength' => true ] ) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
	        <?= $form->field( $model, 'desc' )->widget(CKEditor::className(),[
                'editorOptions' => [
                    'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                    'inline' => false, //по умолчанию false
                ],
            ]); ?>
    </div>







    <div class="form-group">
		<?= Html::submitButton( Yii::t( 'app', 'Save' ), [ 'class' => 'btn btn-success' ] ) ?>
    </div>

	<?php ActiveForm::end(); ?>

</div>
