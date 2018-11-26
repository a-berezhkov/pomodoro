<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\admin\models\aOrdersStatus */

$this->title = 'Добавить статус';
$this->params['breadcrumbs'][] = ['label' => 'Статусы заказов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="a-orders-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
