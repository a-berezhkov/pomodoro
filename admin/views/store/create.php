<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\front\models\Store */

$this->title = 'Добавить товар';
$this->params['breadcrumbs'][] = ['label' => 'Склад', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
