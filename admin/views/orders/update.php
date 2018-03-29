<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\admin\models\aOrders */

$this->title = Yii::t('app', 'Update A Orders: {nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'A Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="a-orders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
