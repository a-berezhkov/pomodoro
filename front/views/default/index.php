<?php

use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;

/**
 * @var   $suggests \app\front\models\Store
 */

?>

<div class="page page-index">
    <div class="banners">
        <div class="row">

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
    <div class="products-grid">
        <h2 class="section-title text-center">Горячие предложения</h2>
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
