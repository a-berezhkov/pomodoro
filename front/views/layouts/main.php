<?php
/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\FrontAsset;
use yii\helpers\Html;
use yii\widgets\Menu;

// Вместо yii\bootstrap\Nav

/*
 * Разкомментируйте строки для тестирование работы корзины
 * Уничтожение сессии
 */
//$session = \Yii::$app->session;
//$session->destroy();


FrontAsset::register($this);

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
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=cyrillic,cyrillic-ext"
              rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,700&amp;subset=cyrillic,cyrillic-ext"
              rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800&amp;subset=cyrillic,cyrillic-ext"
              rel="stylesheet">

        <link rel="apple-touch-icon" sizes="76x76" href="<?= \Yii::getAlias('@web') ?>/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= \Yii::getAlias('@web') ?>/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= \Yii::getAlias('@web') ?>/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?= \Yii::getAlias('@web') ?>/favicon/site.webmanifest">
        <link rel="mask-icon" href="<?= \Yii::getAlias('@web') ?>/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">


        <?= Html::csrfMetaTags() ?>
        <title><?= Yii::$app->params['site_title'] . ' | ' . Html::encode($this->title) ?></title>
        <?php $this->head() ?>

    </head>
    <body>
    <?php $this->beginBody() ?>
    <?= \app\widgets\LoginFormWidget::widget([]) ?>
    <div class="wrap">
        <header class="header">
            <div class="container">
                <nav class="navbar">


                    <?php
                    $logo = ['/img/brand-logo.png'];
                    echo Html::a(Html::img($logo), ['/front/default/index/'], ['class' => 'navbar-brand navbar-logo']);

                    // Right side menu
                    $right_menu_items = [
                        ['label' => 'Магазин', 'url' => ['/front/default/shop']],
                        ['label' => 'Доставка', 'url' => ['/front/default/about']],
                        ['label' => 'Контакты', 'url' => ['/front/default/contacts']],
                        \Yii::$app->user->isGuest ? (['label' => 'Войти', 'url' => '#', 'options' => ['data-toggle' => 'modal', 'data-target' => '#login-modal']]) : ([
                            'label' => 'Личный кабинет',
                            'url' => \yii\helpers\Url::toRoute(['/user/settings/profile']),
                            'template' => '<a href="{url}" data-method="post">{label}</a>'
                        ]),
                        !\Yii::$app->user->isGuest ? (['label' => 'Выйти', 'url' => \yii\helpers\Url::toRoute(['/user/logout']), 'options' => ['data-toggle' => 'modal', 'data-target' => '#login-modal']]) : null
                    ];

                    echo Menu::widget([
                        'items' => $right_menu_items,
                        'options' => [
                            //'id' => 'w0-collapse',
                            'class' => 'navbar-nav navbar-left hidden-xs',
                        ],
                        'itemOptions' => [
                            'class' => 'menu-item'
                        ],
                    ]);

                    // Left side menu
                    $right_menu_items = [
                        [
                            'label' => '+7 (812) 920-09-27',
                            'url' => '+7 (812) 920-09-27'
                        ],
                        [
                            'label' => 'Обратный звонок',
                            'url' => ['#'],
                            'options' => ['class' => 'menu-item call-button button button-rounded'],
                        ],
                        [
                            'label' => '<i class="icon icon-icon-cart"></i>',
                            'template' => '<a class="dropdown-toggle" data-toggle="dropdown">{label}</a><div id="cart-stores" class="dropdown-menu"></div>',
                            'options' => ['class' => 'dropdown menu-item icon', 'id' => 'shopping-basket']
                        ],
                        // Temprorary disable
                        //['label' => FA::i('search'), 'url' => ['#']],
                        \Yii::$app->user->isGuest ? ([
                            'label' => '<i class="icon icon-logout"></i>',
                            'url' => '#',
                            'options' => ['class' => 'menu-item icon icon-bg-black', 'data-toggle' => 'modal', 'data-target' => '#login-modal']]) :
                            ([
                                'label' => '<i class="icon icon-login"></i>',
                                'url' => \yii\helpers\Url::toRoute(['/user/logout']),
                                'options' => ['class' => 'menu-item icon icon-bg-green'],
                                'template' => '<a href="{url}" data-method="post">{label}</a>',
                            ])
                    ];

                    echo Menu::widget([
                        'items' => $right_menu_items,
                        'options' => [
                            'class' => 'navbar-nav navbar-right hidden-xs',
                            //'id' => 'w0-collapse',
                        ],
                        'itemOptions' => [
                            'class' => 'menu-item'
                        ],
                        'encodeLabels' => false,
                    ]); ?>


                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#phone-menu">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                </nav>
            </div>


            <div id="phone-menu" class="collapse">
                <div class="inner">

                    <button class="navbar-toggle" data-toggle="collapse" data-target="#phone-menu">
                        <i class="icon-cancel"></i>
                    </button>

                    <?php
                    $phone_menu_items = [
                        ['label' => 'Главная', 'url' => ['/front/default/']],
                        ['label' => 'Магазин', 'url' => ['/front/default/shop']],
                        ['label' => 'Доставка', 'url' => ['/front/default/about']],
                        ['label' => 'Контакты', 'url' => ['/front/default/contacts']],
                        ['label' => 'Личный кабинет', 'url' => \yii\helpers\Url::toRoute(['/user/settings/profile'])],
                        ['label' => 'Корзина', 'url' => ['/front/cart/cart'], 'options' => ['id'=>"shopping-basket"] ],
                    ];

                    echo Menu::widget([
                        'items' => $phone_menu_items,
                        'options' => [
                            'class' => 'navbar-nav',
                            //'id' => 'w0-collapse',
                        ],
                        'itemOptions' => [
                            'class' => 'menu-item'
                        ],
                        'encodeLabels' => false,
                    ]); ?>
                    >
                    <div class="search">
                        <? \yii\bootstrap\ActiveForm::begin([
                            'action' => \yii\helpers\Url::to(['/front/default/shop']),
                            'method' => 'get',
                        ]) ?>

                        <?= \yii\helpers\Html::input('text', 'StoreSearch[name]', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Введите поисковый запрос',
                        ]) ?>

                        <button class="btn btn-block button-primary">Найти</button>

                        <? \yii\bootstrap\ActiveForm::end() ?>
                    </div>

                    <div class="bottom text-center">
                        <div class="phone"><a href="tel:+7 (812) 920-09-27">+7 (812) 920-09-27</a></div>
                        <div class="back"><a href="">Обратный звонок</a></div>
                    </div>
                </div>
            </div>


        </header>

        <main class="main">
            <div class="container">
                <?= $content ?>
            </div>
        </main>

        <?php
        if (Yii::$app->controller->action->id == 'contacts' || Yii::$app->controller->action->id == 'about'):
            ?>
            <div id="location" style="height: 500px;"></div>
        <?php endif; ?>

    </div>


    <footer class="footer">

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-3">
                    <div class="copyright">
                        <p>© 2018 / ООО «Синьор Помидор»<br/>Россия, Санкт-Петербург, ул. Софийская, 60</p>
                        <p><?= Html::a('Схема проезда', '#') ?>
                            <!--                             --><? //= Html::a('Информация об ограничениях', '#') ?>
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 hidden-xs">
                    <div class="logo text-center">
                        <?= Html::img(['/img/logo-footer.png']) ?>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3">
                    <div class="call">
                        <div class="pull-left phone-icon"><?= Html::img(['/img/icons/extra-phone.png']) ?></div>
                        <div class="text-right"><?= Html::a('8-812-920-09-27', 'tel:8-812-920-09-27', ['class' => 'number']) ?></div>
                        <div class="text-right"><?= Html::a('Обратный звонок', '#', ['class' => 'back']) ?></div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3">
                    <div class="social">

                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>