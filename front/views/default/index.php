<?php

use rmrevin\yii\fontawesome\FA;

/**
 * @var   $suggests \app\front\models\Store
 */

?>

<?php

$this->title = 'Синьор Помидор';

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Синьор Помидор',
]);
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Синьор Помидор - доставка свежих фруктов и овощей до вашего магазина',
]);

?>

<div class="page page-index">
    <div class="banners hidden-xs">
        <div class="row">

            <div class="col-xs-12 col-md-8">
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
    <div class="front-search">
        <div class="special-row">
            <div class="search-panel">
                <? \yii\bootstrap\ActiveForm::begin([
                    'action' => \yii\helpers\Url::to(['/front/default/shop']),
                    'method' => 'get',
                    'options' => [
                        'class' => '',
                        'id' => 'search-form',
                    ],

                ]) ?>
                <div class="input-group">
                    <?= \yii\helpers\Html::input('text', 'StoreSearch[name]', null, [
                        'class' => 'form-control',
                        'placeholder' => 'Введите название товара',
                    ]) ?>

                    <span class="input-group-btn"><button class="btn button-search"
                                                          type="submit">Найти</button></span>
                </div><!-- /input-group -->
                <? \yii\bootstrap\ActiveForm::end() ?>
            </div>

        </div><!-- /.row -->
    </div>
    <div class="categories-phone row visible-xs-block">
        <div class="col-xs-12">
            <div class="banner">
                <div class="title">Горячие предложения</div>
            </div>
        </div>
        <?=
        /**
         * Для мобильного
         */
        $this->render('_categories-phone', ['categories' => $categories])
        ?>
    </div>
    <div class="products-grid">
        <h2 class="section-title hot text-center">ЧТО ВЫГОДНО СЕГОДНЯ</h2>
        <p></p>
        <?=
        /**
         * Раздел c товарами
         * Категории справа
         */
        $this->render('_suggest', ['suggests' => $suggests])
        ?>

    </div>
    <div class="front-helpdesk">
        <div class="row">
            <div class="col-md-6" >
            <div  style="background:black;z-index:-1 ;">
                    <div class="video" style="width:100%;opacity:0.8;">

                        <div class="message"   ">
                            <div class="title text-center">Как тут все работает?</div>
                            <div class="icon text-center">
                                <a href="http://signorpomidor.ru/web/img/presentation.pdf">
                                    <div class="play-icon">
                                        <?= FA::i('file-pdf-o'); ?>
                                    </div>
                                </a>
                            </div>

                            <div class="title text-center">Посмотрите нашу презентацию</div>
                        </div>
                    </div>
            </div>
            </div>

            <div class="col-md-6">
                <div class="order text-center">
                    <div class="row">
                        <div class="col-md-offset-6 col-md-6">
                            <? \yii\bootstrap\ActiveForm::begin([
                                'action' => \yii\helpers\Url::to(['/front/orders/view-order']),
                                'method' => 'get',
                                'options' => [
                                    'class' => 'order-form',
                                ],
                            ]) ?>


                            <?= \yii\helpers\Html::input('string', 'code', null, [
                                'class' => 'form-control number',
                                'placeholder' => 'Введите номер накладной',
                            ]) ?>

                            <button class="btn button button-get-orders">Отследить</button>
                            <? \yii\bootstrap\ActiveForm::end() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="front-partners">
        <div class="row">
            <!--            <div class="col-xs-4 col-md-2">-->
            <!--                <div class="partner"></div>-->
            <!--            </div>-->
            <!--            <div class="col-xs-4 col-md-2">-->
            <!--                <div class="partner"></div>-->
            <!--            </div>-->
            <!--            <div class="col-xs-4 col-md-2">-->
            <!--                <div class="partner"></div>-->
            <!--            </div>-->
            <!--            <div class="col-xs-4 col-md-2">-->
            <!--                <div class="partner"></div>-->
            <!--            </div>-->
            <!--            <div class="col-xs-4 col-md-2">-->
            <!--                <div class="partner"></div>-->
            <!--            </div>-->
            <!--            <div class="col-xs-4 col-md-2">-->
            <!--                <div class="partner"></div>-->
            <!--            </div>-->
        </div>
    </div>
</div>
