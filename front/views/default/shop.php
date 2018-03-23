<?php
use yii\widgets\ListView;
?>

<style>

    .carousel-control.right, .carousel-control.left {
        background-image: none;
    }

    .carousel-control {
        color: #0f0f0f ;
    }

    .front-banners .glyphicon-chevron-right,.front-banners .glyphicon-chevron-left   {
        /* Фон значков и цвет*/
        color: white;
        background: black;
        border-radius: 50%;
        padding: 5px;
        border: 2px solid white;
    }

    .carousel-control .glyphicon-chevron-left, .carousel-control .glyphicon-chevron-right, .carousel-control .icon-prev, .carousel-control .icon-next {
        /*Что бы значки были круглыми */
        width: auto;
        height: auto;
    }

    .carousel-control .glyphicon-chevron-right {
        right: 25%;
    }
    .carousel-control .glyphicon-chevron-left {
        left: 25%;
    }


</style>
<div class="front-banners">
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-8">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <?= $this->render('slider/_slider'); ?>
</div>
<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
        </div>

        <div class="row">
            <div class="col-md-12">
                Горячие предложения
            <?= $this->render('store/recommendation',['dataProvider'=>$hotDataProvider]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                Основной ассортимент

            </div>
        </div>
        <? \yii\widgets\Pjax::begin() ?>
        <div class="row">
            <div class="col-md-4">
                    <?// \yii\helpers\VarDumper::dump($dataProvider->query->all(),10,true) ?>
                <?= $this->render('store/_shop_search', ['model' => $searchModel]);  ?>
            </div>
            <div class="col-md-6">
                <div class="row">
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,

                    'itemView' => 'store/_shop_items',
                    'itemOptions' => ['class'=>'col-md-3']
                ]); ?>
                </div>
                </div>
          </div>
<? \yii\widgets\Pjax::end() ?>