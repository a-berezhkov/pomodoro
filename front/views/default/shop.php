<?php

use yii\widgets\ListView;

?>

<div class="shop">
    <div class="banners">
        <div class="row">
            <div class="col-md-4">
                <div class="welcome">
                    <h1 class="title">
                        Добро пожаловать в наш интернет магазин!
                    </h1>
                    <div class="description">
                        Выбирайте товары, добавляйте в корзину. У нас всегда самые свежие фрукты и овощи.
                        Мы доставим заказ точно и в срок.
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div id="carousel-products-generic" class="carousel slide" data-ride="carousel">
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
        </div>
    </div>


    <div class="products-grid">
        <h2 class="section-title text-center">Горячие предложения</h2>
        <p class="text-center">Автор неверно акцентирует внимание в своей работе на новину какой-то штуки. В статье представлены расчеты чего-нибудь, которые полностью расходятся с тем, что должно иметь место в соответствии с какой-нибудь классической теорией. </p>

        <?= $this->render('store/recommendation', ['dataProvider' => $hotDataProvider]) ?>

    </div>

    <div class="assortment">
        <h2 class="section-title text-center">Основной ассортимент</h2>
        <p class="text-center">Автор неверно акцентирует внимание в своей работе на новину какой-то штуки. В статье представлены расчеты чего-нибудь, которые полностью расходятся с тем, что должно иметь место в соответствии с какой-нибудь классической теорией. </p>

        <? \yii\widgets\Pjax::begin() ?>
        <div class="row">
            <div class="col-md-4">
                <? // \yii\helpers\VarDumper::dump($dataProvider->query->all(),10,true) ?>
                <?= $this->render('store/_shop_search', ['model' => $searchModel]); ?>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <?= ListView::widget([
                        'dataProvider' => $dataProvider,

                        'itemView' => 'store/_shop_items',
                        'itemOptions' => ['class' => 'col-md-3']
                    ]); ?>
                </div>
            </div>
        </div>

        <? \yii\widgets\Pjax::end() ?>


    </div>
</div>