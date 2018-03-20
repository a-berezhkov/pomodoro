<?php

use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;

/**
 * @var   $suggests \app\front\models\Store
 */

?>
<!-- TODO перенести в SCSS стили для слайдера -->
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
<div class="front-default-index">
    <div class="front-banners">
        <div class="row">

            <div class="col-md-8">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <?= $this->render('_slider'); ?>
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

            <div class="col-md-4">
                <?=
                /**
                 * Раздел с категориями на главной
                 * Категории справа
                 */
                $this->render('_categories-right', ['categories' => $categories])
                ?>
            </div>

        </div>
        <?=
        /**
         * Раздел с категориями на главной
         * Категории снизу
         */
        $this->render('_categories-bottom', ['categories' => $categories])
        ?>

    </div>
    <div class="front-hot">
        <h2 class="title text-center">Горячие предложения</h2>
        <p class="text-center">Автор неверно акцентирует внимание в своей работе на новину какой-то штуки. В
            статье
            представлены расчеты чего-нибудь, которые полностью расходятся с тем, что должно иметь место в
            соответствии
            с какой-нибудь классической теорией. </p>
        <?=
        /**
         * Раздел c товарами
         * Категории справа
         */
        $this->render('_suggest', ['suggests' => $suggests])
        ?>

    </div>
    <div class="front-search">
        <div class="special-row">
            <div class="col-md-12">
                <div class="search-panel">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn"><button class="btn button-search"
                                                              type="button">Найти</button></span>
                    </div><!-- /input-group -->
                </div>
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div>
    <div class="front-helpdesk">
        <div class="row">
            <div class="col-md-6">
                <div class="video">
                    <div class="message">
                        <div class="title text-center">Как тут все работает?</div>
                        <div class="icon text-center">
                            <a href="#">
                                <div class="play-icon">
                                    <?= FA::i('play'); ?>
                                </div>
                            </a>
                        </div>

                        <div class="title text-center">Посмотрите обучающее видео</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="order text-center">
                    <div class="row">
                        <div class="col-md-offset-6 col-md-6">
                            <div class="order-form">
                                <input type="text" class="form-control number"
                                       placeholder="Введите номер накладной">
                                <button class="btn button button-get-orders">Отследить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="front-partners">
        <div class="row">
            <div class="col-md-2">
                <div class="partner"></div>
            </div>
            <div class="col-md-2">
                <div class="partner"></div>
            </div>
            <div class="col-md-2">
                <div class="partner"></div>
            </div>
            <div class="col-md-2">
                <div class="partner"></div>
            </div>
            <div class="col-md-2">
                <div class="partner"></div>
            </div>
            <div class="col-md-2">
                <div class="partner"></div>
            </div>
        </div>
    </div>
</div>
