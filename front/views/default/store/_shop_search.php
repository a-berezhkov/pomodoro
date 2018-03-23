<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\front\models\StoreSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="store-search">

    <?php $form = ActiveForm::begin([
        'action' => ['/front/default/shop'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <? //= $form->field($model, 'id') ?>

    <? //= $form->field($model, 'name') ?>

    <? //= $form->field($model, 'boxes_count') ?>

    <? //= $form->field($model, 'box_weight') ?>

    <? //= $form->field($model, 'box_price') ?>

    <?php // echo $form->field($model, 'desc') ?>

    <?php // echo $form->field($model, 'logo_id') ?>

    <?php // echo $form->field($model, 'country_id') ?>
    <?
    // TODO - стоит во вью так делать?

    $categories = \app\front\models\Categories::find()->all();

    foreach ($categories as $category) {
        // TODO по какой то причине если не авторизован то при нажатии на категории обновляет страницу
        echo Html::a(
            $category->name,
            Url::to(['/front/default/shop', 'StoreSearch[category_id]' => $category->id]),
            [
                'name' => 'StoreSearch[category_id]',
                'value' => $category->id,
                'onclick' => '$( "form" ).submit();',
                'class' => 'btn btn-block button button-inverse'
            ]
        );
    }


    ?>


    <?php // echo $form->field($model, 'is_sale') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <? //= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <? //= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
