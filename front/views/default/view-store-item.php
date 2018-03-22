<?php
/**
 * @var $item \app\front\models\Store
 */
use yii\widgets\ListView;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\widgets\Pjax;

$var = 123;
//начало многосточной строки, можно использовать любые кавычки
$script = <<< JS
  (function ($) {
  $('.spinner .btn:first-of-type').on('click', function() {
    $('.spinner input').val( parseInt($('.spinner input').val(), 10) + 1);
  });
  $('.spinner .btn:last-of-type').on('click', function() {
    $('.spinner input').val( parseInt($('.spinner input').val(), 10) - 1);
  });
})(jQuery);
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);


?>

<style>
    .spinner {
        width: 100px;
    }
    .spinner input {
        text-align: right;
    }
    .input-group-btn-vertical {
        position: relative;
        white-space: nowrap;
        width: 1%;
        vertical-align: middle;
        display: table-cell;
    }
    .input-group-btn-vertical > .btn {
        display: block;
        float: none;
        width: 100%;
        max-width: 100%;
        padding: 8px;
        margin-left: -1px;
        position: relative;
        border-radius: 0;
    }
    .input-group-btn-vertical > .btn:first-child {
        border-top-right-radius: 4px;
    }
    .input-group-btn-vertical > .btn:last-child {
        margin-top: -2px;
        border-bottom-right-radius: 4px;
    }
    .input-group-btn-vertical i{
        position: absolute;
        top: 0;
        left: 4px;
    }
</style>
<div class="row">
    <div class="col-md-6">
        <?= Html::img(\Yii::$app->imagemanager->getImagePath($item->logo_id, '440', '190', 'inset')); ?>
    </div>
    <div class="col-md-6">
        <?= $item->name ?>
        <?= $item->discount_box_price ?>
        <?= $item->box_price ?>
        <?= $item->desc ?>
        <?= $item->box_weight ?>
        <?= $item->boxes_count ?>
        <?= $item->country->name ?>
        <div class="input-group spinner">
            <input type="text" id="item-count" class="form-control" value="42">
            <div class="input-group-btn-vertical">
                <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
            </div>
        </div>
        <button id="to-basket">В корзину</button>
    </div>
</div>



<h2>Рекоммендованные товары</h2>
<?
Pjax::begin();
?>

<?=
ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView'     => '_like_item_store',
        'summary'      => false,
        'layout'       => " \n{items}\n{pager}",
        'options'      => [

            'tag'   => 'div',
            'class' => 'row',
            'id'    => 'suggest-items', // Селектор контента

        ],
        'itemOptions'  => [
            'class' => 'col-md-3',


        ],
        //
        'pager'        => [

            'class'               => 'mranger\load_more_pager\LoadMorePager',
            'id'                  => 'card_paginator',
            'buttonText'          => Yii::t('app', 'Find more'), // Текст на кнопке пагинации
            // 'template'            => '<div class="col col-2 offset-5 "><div class="button round button-theme ">{button}</div></div>', // Шаблон вывода кнопки пагинации
            'template'            => ' <div class="text-center" style="margin: auto">{button}</div> ',
            // 'template' => ' <div class="text-center">{button}</div> ',
            'contentSelector'     => '#suggest-items', // Селектор контента
            'contentItemSelector' => '.col-md-3:not(.even)', // Селектор эллементов контента
            'includeCssStyles'    => false, // Подключать ли CSS стили виджета, или вы оформите пагинацию сами
            'loaderShow'          => true, // Отображать ли индикатор загрузки
            'loaderAppendType'    => \mranger\load_more_pager\LoadMorePager::LOADER_APPEND_TYPE_CONTENT,
            // Тот эллемент, к которому будет прикреплен индикатор загрузки. Варианты: тег body, после контента, перед кнопкой пагинации, внутри кнопки пагинации
            'loaderTemplate'      => '<i class="load-more-loader"></i>', // Шаблон индикатора загрузки
            'options'             => ['class' => 'button round button-theme'], // Массив опций кнопки паганации
            'onLoad'              => new JsExpression('function(){ console.log("onLoad");}'),
            // Событие javascript которое будет вызываться в момент начала загрузки новых эллементов, обработчик должен быть описан через JsExpression, в функцию будет передаваться объект с настройками пагинатора, которые вы указали при инициализации
            'onAfterLoad'         => new JsExpression('function(){ console.log("onAfterLoad");}'),
            // Событие javascript которое будет вызываться в момент окончания загрузки новых эллементов
            'onFinished'          => new JsExpression('function(){console.log("onFinished");$("#more-button").attr("style","display:none;")}'),
            'onFinished'          => new JsExpression('function(){console.log("onFinished");$("#more-button").remove()}'),
            'onError'             => new JsExpression('function(){ console.log("error");}'),
            // Событие javascript которое будет вызываться в момент, когда произошла ошибка при загрузке новых эллементов
        ],


    ]
);

?>
<? Pjax::end(); ?>

