<?php
/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;

//use Nav
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
use yii\widgets\Menu; // Вместо yii\bootstrap\Nav
//use yii\widgets\Breadcrumbs;
use app\assets\FrontAsset;

FrontAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                    <div class="navbar-left">
                        <?php
                        echo Menu::widget([
                            'items' => [
                                ['label' => 'Магазин', 'url' => ['#']],
                                ['label' => 'Доставка', 'url' => ['#']],
                                ['label' => 'Контакты', 'url' => ['#']],
                                ['label' => 'Личный кабинет', 'url' => ['#']],
                                // 'Products' menu item will be selected as long as the route is 'product/index'
                            ],
                        ]);
                        ?>
                    </div>
                    <div class="navbar-right">
                        <?php
                        echo Menu::widget([
                            'items' => [
                                ['label' => '8-800-200-34-19', 'url' => ['tel:8-800-200-34-19']],
                                ['label' => 'Обратный звонок', 'url' => ['#']],
                                ['label' => 'ico1', 'url' => ['#']],
                                ['label' => 'ico2', 'url' => ['#']],
                                ['label' => 'ico3', 'url' => ['#']],
                            ]
                        ]);
                        ?>
                    </div>
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
                <div class="col-md-3">1</div>
                <div class="col-md-3">2</div>
                <div class="col-md-3">3</div>
                <div class="col-md-3">4</div>
            </div>
        </footer>
    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>