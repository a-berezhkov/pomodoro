<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
$this->title = Yii::t('app', 'Profile info');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-view">

    <h1><?= $profile_name ?></h1>
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
            'id',
            'id_store',
            'count',
            'sum',
            'is_sale'
        ]
    ]); ?>

    <?php Pjax::end(); ?>
</div>
