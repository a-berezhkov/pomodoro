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
            'id',
//            'orders.orders_status.name',
            'cart.profile.name',
            'cart.count',
            'cart.sum',
            'cart.id',
            'cart_id',
//            'orders.id',
            'order_id',

        ]
    ]); ?>

    <?php Pjax::end(); ?>
</div>
