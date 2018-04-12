<?php

use yii\grid\GridView;

?>
<div class="row">
    <div class="col-md-3">
        <?= $this->render('_menu') ?>
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <?= $this->render('_top_menu', ['cart' => 'active']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?=
                GridView::widget([
                    'dataProvider' => $userOrders,
                    'columns'      => [
                        ['class' => 'yii\grid\SerialColumn'],

                        //  'id',
                        // 'address_street',
                        //  'address_house',
                        //   'address_housing',
                        //  'address_office',
                        //'address_phone',
                        'delivery_date:date',
                        'delivery_interval',

                        [
                            'attribute' => 'delivery_status',
                            'value'     => 'deliveryStatus.name',
                            //   'filter' => ArrayHelper::map(aOrdersStatus::find()->asArray()->all(), 'id', 'name'),
                        ],
                        'created_at',
                        //'created_by',
                        //'dropping',
                        //'dropping_at',

                        [
                                'attribute' => 'unique_code',
                                'value' => function($data){
                                return \yii\helpers\Html::a(
                                        $data->unique_code,
                                        [
                                                '/front/orders/view-order',
                                                'code'=> $data->unique_code
                                        ]);
                                },
                                'format' =>'html'
                        ]
                        //'comment:ntext',
                        //'google_id',


                        // TODO отмена заказа
                        // ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);

                ?>
            </div>
        </div>
    </div>
</div>
