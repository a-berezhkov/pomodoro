<?php
/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;

use yii\widgets\Menu; // Вместо yii\bootstrap\Nav
use app\assets\FrontAsset;
use rmrevin\yii\fontawesome\FA;

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

        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
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
                        ['label' => 'Доставка', 'url' => ['#']],
                        ['label' => 'Контакты', 'url' => ['/front/default/contacts']],
                        \Yii::$app->user->isGuest ? (['label' => 'Личный кабинет', 'url' => '#', 'options' => ['data-toggle' => 'modal', 'data-target' => '#login-modal']]) : ([
                            'label' => 'Личный кабинет',
                            'url' => \yii\helpers\Url::toRoute(['/user/settings/profile']),
                            'template' => '<a href="{url}" data-method="post">{label}</a>'
                        ])
                    ];

                    echo Menu::widget([
                        'items' => $right_menu_items,
                        'options' => [
                            'class' => 'navbar-nav navbar-left',
                        ],
                        'itemOptions' => [
                            'class' => 'menu-item'
                        ],
                    ]);

                    // Left side menu
                    $right_menu_items = [
                        [
                            'label' => '8-800-200-34-19',
                            'url' => 'tel:8-800-200-34-19'
                        ],
                        [
                            'label' => 'Обратный звонок',
                            'url' => ['#'],
                            'options' => ['class' => 'menu-item call-button'],
                        ],
                        [
                            'label' => FA::i('shopping-basket'),
                            'template' => '<a class="dropdown-toggle" data-toggle="dropdown">{label}</a><div id="cart-stores" class="dropdown-menu"></div>',
                            'options' => ['class' => 'dropdown menu-item', 'id' => 'shopping-basket']
                        ],
                        // Temprorary disable
                        //['label' => FA::i('search'), 'url' => ['#']],
                        \Yii::$app->user->isGuest ? (['label' => FA::i('unlock'), 'url' => '#', 'options' => ['data-toggle' => 'modal', 'data-target' => '#login-modal']]) : ([
                            'label' => FA::i('lock'),
                            'url' => \yii\helpers\Url::toRoute(['/user/logout']),
                            'template' => '<a href="{url}" data-method="post">{label}</a>'
                        ])
                    ];

                    echo Menu::widget([
                        'items' => $right_menu_items,
                        'options' => [
                            'class' => 'navbar-nav navbar-right'
                        ],
                        'itemOptions' => [
                            'class' => 'menu-item'
                        ],
                        'encodeLabels' => false,
                    ]); ?>

                </nav>
            </div>
        </header>

        <main class="main">
            <div class="container">
                <?= $content ?>
            </div>
        </main>

        <footer class="footer">

            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="copyright">
                            <p>© 2018 / ООО «Синьор Помидор»<br/>Россия, Санкт-Петербург, ул. Салова 34</p>
                            <p><?= Html::a('Схема проезда', '#') ?>
                                / <?= Html::a('Информация об ограничениях', '#') ?></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="logo text-center">
                            <?= Html::img(['/img/logo-footer.png']) ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="call">
                            <div class="text-right"><?= Html::a('8-800-200-34-19', 'tel:8-800-200-34-19', ['class' => 'number']) ?></div>
                            <div class="text-right"><?= Html::a('Обратный звонок', '#', ['class' => 'back']) ?></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="social">

                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>