<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\admin\models\aOrdersStatus;
/* @var $this yii\web\View */
/* @var $searchModel app\admin\models\aOrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'A Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="a-orders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create A Orders'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
         // 'address_street',
          //  'address_house',
         //   'address_housing',
          //  'address_office',
            //'address_phone',
             'delivery_date',
            'delivery_interval',

            [
                 'attribute' =>  'delivery_status',
                 'value' => 'deliveryStatus.name',
                 'filter' => ArrayHelper::map(aOrdersStatus::find()->asArray()->all(), 'id', 'name'),
],
            //'created_at',
            //'created_by',
            //'dropping',
            //'dropping_at',
            'unique_code',
            //'comment:ntext',
            //'google_id',

            ['class' => 'yii\grid\ActionColumn'],
            [
                    'class' => 'yii\grid\ActionColumn',
                'controller' => 'info',
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url,$model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-screenshot"></span>',
                            $url);
                    },
                    ]
            ]
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
