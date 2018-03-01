<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\front\models\fPartners */

$this->title = Yii::t('app', 'Create F Partners');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'F Partners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="f-partners-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
