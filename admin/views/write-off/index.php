<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\admin\models\WriteOffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title =  'Списания и добавления';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="write-off-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',

            [
              'attribute'  =>  'id_store',
              'value' => 'store.name'
            ],
            'count_box',

            'in',
            'out',
              'created_at',
            //'updated_at',

             [
                     'attribute' =>       'created_by',
                     'value' => 'createdBy.name'
            ],
             //'updated_by',
            'count_weight',
            [
                    'class' => 'yii\grid\ActionColumn',
                    'template'=>'{view}',
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
