<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\admin\models\aOrdersStatus */

$this->title = 'Обновить статус';
$this->params['breadcrumbs'][] = ['label' => 'Статусы заказов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="a-orders-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
