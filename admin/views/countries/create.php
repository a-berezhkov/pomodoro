<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\admin\models\aCountries */

$this->title = 'Добавить страну';
$this->params['breadcrumbs'][] = ['label' => 'Страны', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="a-countries-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
