<?php

use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;

/**
 * @var   $suggests \app\front\models\Store
 */
?>

<div class="front-default-index">
    <div class="front-banners">
        <div class="row">
            <div class="col-md-8">
                <div class="product main">
                    <?= Html::img(['/img/products/m-1.png']); ?>
                    <div class="details">
                        <div class="name text-center">
                            Томаты Бакинские
                        </div>
                        <div class="price text-center">
                            <s>7550</s> 6850 ₽
                        </div>
                        <div class="description text-center">
                            Цена за упаковку
                            <div class="meta">
                                <span class="weight">25</span>
                                <span class="boxes">12</span>
                            </div>
                        </div>
                        <button class="btn button button-more">Подробнее</button>
                    </div>
                </div>
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
        <p class="text-center">Автор неверно акцентирует внимание в своей работе на новину какой-то штуки. В статье
            представлены расчеты чего-нибудь, которые полностью расходятся с тем, что должно иметь место в соответствии
            с какой-нибудь классической теорией. </p>
        <?=
        /**
         * Раздел c товарами
         * Категории справа
         */
        $this->render('_suggest', ['suggests' =>  $suggests])
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
