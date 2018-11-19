<?php

use app\admin\models\aOrdersStatus;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\admin\models\aOrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="a-orders-index">
    <div class="box box-solid">
        <div class="box-header with-border">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="box-body">

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


            <?= \kartik\grid\GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel'  => $searchModel,
                'toolbar'      => [
                    '{export}',

                ],
                'export'       => [
                    'fontAwesome' => true,
                ],
                'panel'        => [
                    'type' => \kartik\grid\GridView::TYPE_PRIMARY,
                    // 'heading' => $heading,
                ],
                'columns'      => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    [
                        'attribute' => 'address_street',
                        'label'     => 'Адрес',
                        'value'     => 'fullAddress',
                    ],

                    'address_phone',
                    [

                        'attribute' => 'delivery_date',
                        'filter'    => \kartik\date\DatePicker::widget([
                            'model'         => $searchModel,
                            'attribute'     => 'delivery_date',
                            'options'       => ['placeholder' => 'Выберите дату доставки'],
                            'pluginOptions' => [
                                'format'         => 'yyyy-mm-dd',
                                'todayHighlight' => true,
                            ],
                        ]),
                        'format' => 'date'
                    ],


                    [
                        'attribute' => 'delivery_interval',
                        'filter'    => '',
                    ],

                    [
                        'class'     => 'kartik\grid\EditableColumn',
                        'attribute' => 'delivery_status',
                        'vAlign'    => 'middle',
                        'width'     => '180px',

                        'value'               => function ($model, $key, $index, $widget) {
                            return Html::a($model->deliveryStatus->name,
                                '#',
                                ['title' => $model->deliveryStatus->name]);
                        },
                        'filterType'          => \kartik\grid\GridView::FILTER_SELECT2,
                        'filter'              => ArrayHelper::map(aOrdersStatus::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
                        'filterWidgetOptions' => [
                            'pluginOptions' => ['allowClear' => true],
                        ],
                        'filterInputOptions'  => ['placeholder' => 'Выберите статус закза'],
                        'format'              => 'raw',
                        'editableOptions'     => function ($model, $key, $index) {
                            return [
                                'header'      => 'Name',
                                'size'        => 'md',
                                'inputType'   => \kartik\editable\Editable::INPUT_SELECT2,
                                'options'     => [
                                    'attribute' => 'delivery_status',
                                    'data'      => ArrayHelper::map(aOrdersStatus::find()->asArray()->all(), 'id', 'name'),
                                ],
                                'formOptions' => [
                                    'method' => 'post',
                                    'action' => ['/admin/orders/edit-field'],
                                ],

                            ];
                        },
                    ],
                    //'created_at',
                    //'created_by',

                    //'dropping_at',
                    'unique_code',
                    'comment:ntext',
                    //'google_id',

                    [
                        'class' => 'kartik\grid\BooleanColumn',
                        'attribute' =>  'dropping',
                        'falseLabel' =>'Нет',
                        'trueLabel' =>'Да',
                        'label' => 'Заказ отменен'
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',

                        'template' => '{view}{update}{cart}',
                        'buttons'  => [
                            'cart' => function ($url, $model) {
                                return Html::a(
                                    '<span class="glyphicon glyphicon-screenshot"></span>',
                                    \yii\helpers\Url::to(['/admin/info/view', 'id' => $model->id]));
                            },


                        ],
                    ],
                ],
            ]); ?>

        </div>
    </div>
