<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
$this->title = Yii::t('app', 'Profile information');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="info-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <div class="date-form">

        <?php $form = ActiveForm::begin() ?>

        <?= $form->field($model, 'doDate')->widget(\yii\jui\DatePicker::class, [
            'dateFormat' => 'yyyy-MM-dd',
        ]) ?>

        <?= $form->field($model, 'toDate')->widget(\yii\jui\DatePicker::class, [
            'dateFormat' => 'yyyy-MM-dd',
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end() ?>

    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
            'cart.profile.name',
            'cart.store.name',
            'cart.count',
            'cart.sum',
            [
                'attribute' => 'delivery_status',
                'value' => 'order.deliveryStatus.name'
],
            'order.created_at'
        ]
    ]); ?>
    <h1>
        <?= Yii::t('app', 'Sum = '.$summ) ?>
    </h1>
    <?php Pjax::end(); ?>
</div>
