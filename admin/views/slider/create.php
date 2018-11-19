<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\admin\models\aSlider */

$this->title = 'Добавть слайдер';
$this->params['breadcrumbs'][] = ['label' => 'Слайдер', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="a-slider-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
