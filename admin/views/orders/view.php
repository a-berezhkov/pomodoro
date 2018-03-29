<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\admin\models\aOrders */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'A Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="a-orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'address_street',
            'address_house',
            'address_housing',
            'address_office',
            'address_phone',
            'delivery_date',
            'delivery_interval',
            'delivery_status',
            'created_at',
            'created_by',
            'dropping',
            'dropping_at',
            'unique_code',
            'comment:ntext',
            'google_id',
        ],
    ]) ?>

</div>
