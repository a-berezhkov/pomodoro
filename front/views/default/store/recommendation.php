<?php
use yii\widgets\ListView;
use yii\web\JsExpression;
?>

<?=
ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView'     => '_recommendation',
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
