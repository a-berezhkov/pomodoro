<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
$this->title = Yii::t('app', 'Profile info');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

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

    <?php Pjax::end(); ?>
</div>
