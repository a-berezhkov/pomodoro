<?php
/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;

use yii\widgets\Menu; // Вместо yii\bootstrap\Nav
use app\assets\FrontAsset;
use rmrevin\yii\fontawesome\FA;

FrontAsset::register($this);
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
    </head>
    <body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <header class="header">

            <div class="container">
                <nav class="navbar">

                    <?php $logo = '#'; ?>
                    <?= Html::a(Html::img($logo), ['default/index/'], ['class' => 'navbar-brand navbar-logo']) ?>

                    <?php
                    echo Menu::widget([
                        'items' => [
                            ['label' => 'Магазин', 'url' => ['#']],
                            ['label' => 'Доставка', 'url' => ['#']],
                            ['label' => 'Контакты', 'url' => ['#']],
                            ['label' => 'Личный кабинет', 'url' => ['#']],
                        ],
                        'options' => [
                            'class' => 'navbar-nav navbar-left',
                        ],
                        'itemOptions' => [
                            'class' => 'menu-item'
                        ],
                    ]);
                    ?>
                    <?php
                    echo Menu::widget([
                        'items' => [
                            ['label' => '8-800-200-34-19', 'url' => 'tel:8-800-200-34-19'],
                            ['label' => 'Обратный звонок', 'url' => ['#'], 'options' => ['class' => 'menu-item call-button']],
                            ['label' => FA::i('shopping-basket'), 'url' => ['#']],
                            ['label' => FA::i('search'), 'url' => ['#']],
                            ['label' => FA::i('lock'), 'url' => ['#']],
                        ],
                        'options' => [
                            'class' => 'navbar-nav navbar-right'
                        ],
                        'itemOptions' => [
                            'class' => 'menu-item'
                        ],
                        'encodeLabels' => false,
                    ]);
                    ?>
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
                            <p><?= Html::a('Схема проезда', '#') ?> / <?= Html::a('Информация об ограничениях', '#')?></p>
                        </div>
                    </div>
                    <div class="col-md-2">2</div>
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