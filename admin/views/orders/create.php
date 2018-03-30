<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\admin\models\aOrders */

$this->title = Yii::t('app', 'Create A Orders');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'A Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="a-orders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
