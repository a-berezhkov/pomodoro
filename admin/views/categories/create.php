<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\admin\models\aCategories */

$this->title = Yii::t('app', 'Create A Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'A Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="a-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
