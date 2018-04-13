<?php

use app\admin\models\aOrdersStatus;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\admin\models\aOrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="a-orders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
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
                'attribute' => 'delivery_status',
                'value'     => 'deliveryStatus.name',
                'filter'    => ArrayHelper::map(aOrdersStatus::find()->asArray()->all(), 'id', 'name'),
            ],
            //'created_at',
            //'created_by',
            //'dropping',
            //'dropping_at',
            'unique_code',
            //'comment:ntext',
            //'google_id',

            [
                'class'      => 'yii\grid\ActionColumn',

                'template'   => '{view}{update}{cart}',
                'buttons'    => [
                    'cart' => function ($url, $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-screenshot"></span>',
                            \yii\helpers\Url::to(['/admin/info/view','id'=>$model->id]));
                    },


                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
