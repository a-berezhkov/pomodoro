<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model \app\front\models\Orders */
$this->title                   = 'Состав заказа';
$this->params['breadcrumbs'][] = $this->title;
$summ                          = 0;
?>

<div class="box box-solid">
    <div class="box-header with-border">

        <h1><?= Html::encode($this->title).' '.$model->id.' ('.$model->unique_code .') на  '.date('d-m-Y',
                strtotime($model->delivery_date))
            .' интервал '.$model->delivery_interval
            ?></h1>
    </div>
    <div class="box-body">
        <?php Pjax::begin(); ?>
        <div class="date-form">
            <!---->
            <!--        --><?php //$form = ActiveForm::begin() ?>
            <!---->
            <!--        --><? //= $form->field($model, 'doDate')->widget(\yii\jui\DatePicker::class, [
            //            'dateFormat' => 'yyyy-MM-dd',
            //        ]) ?>
            <!---->
            <!--        --><? //= $form->field($model, 'toDate')->widget(\yii\jui\DatePicker::class, [
            //            'dateFormat' => 'yyyy-MM-dd',
            //        ]) ?>
            <!---->
            <!--        <div class="form-group">-->
            <!--            --><? //= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            <!--        </div>-->
            <!---->
            <!--        --><?php //ActiveForm::end() ?>

        </div>

        <?= \kartik\grid\GridView::widget([
            'dataProvider' => $dataProvider,
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
            'showFooter'   => true,
            'columns'      => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'label' => 'Заказчик',
                    'value' => 'profile.company_name',
                ],

                [
                    'label'     => 'Наименование',
                    'attribute' => 'store.name',
                ],
                [
                    'label'     => 'Количество',
                    'attribute' => 'count',
                ],

                [
                    'label'     => 'Сумма',
                    'attribute' => 'sum',
                    'footer'    => $dataProvider->query->sum('sum'),
                ],
                [
                    'attribute' => 'created_at',
                    'label'     => 'Добавлено ',
                    'format'    => 'date',
                ],

                [
                    'label'     => 'Это распродажа',
                    'attribute' => 'is_sale',
                    'value'     => function ($data) {
                        return ($data->is_sale == false) ? 'Нет' : 'Да';
                    },
                ],

            ],
        ]); ?>

        <?php Pjax::end(); ?>
    </div>
</div>
