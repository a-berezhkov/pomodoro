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
    <?=  \app\widgets\LoginFormWidget::widget([])  ?>
    <div class="wrap">
        <header class="header">

            <div class="container">
                <nav class="navbar">

                    <?php $logo = ['/img/brand-logo.png']; ?>
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

                        ],
                        'options' => [
                            'class' => 'navbar-nav navbar-right'
                        ],
                        'itemOptions' => [
                            'class' => 'menu-item'
                        ],
                        'encodeLabels' => false,
                    ]);?>




                    <ul class="navbar-nav navbar-right">
<!--                        <li id="shopping-basket" class="menu-item">-->
<!--                            <a href="/web/front/default/#">-->
<!--                                <i class="fa fa-shopping-basket"></i>-->
<!--                               </a>-->
<!--                        </li>-->

                        <li class="dropdown menu-item" id="shopping-basket" >
                            <a class="dropdown-toggle"  href="#"  data-toggle="dropdown"> <i class="fa fa-shopping-basket"></i> </a>
                            <div class="dropdown-menu" style="padding: 30px; display: none; width: 260px;"
                                 id="cart-stores">
                                <!--  Сюда плдгружаются данные о товарах ajax -->
                                <!--  см. Cart Controller и  view _suggest -->
                            </div>
                        </li>
                    </ul>

                    <?

//                    echo Menu::widget([
//                        'items' => [
//
//                            ['label' => FA::i('shopping-basket'), 'url' => ['#'],'options' => ['id' => 'shopping-basket']],
//
//                        ],
//                        'options' => [
//                            'class' => 'navbar-nav navbar-right'
//                        ],
//                        'itemOptions' => [
//                            'class' => 'menu-item'
//                        ],
//                        'encodeLabels' => false,
//                        'view' => '_menu_cart'
//                    ]);
//                    ?>
                   <?  echo Menu::widget([
                    'items' => [
                            ['label' => FA::i('search'), 'url' => ['#']],
                            \Yii::$app->user->isGuest ? (
                            ['label' => FA::i('lock'), 'url' => '#', 'options' => ['data-toggle' => 'modal', 'data-target' => '#login-modal']]
                            ) : (
                            [
                                'label' => FA::i('user').' '.\Yii::$app->user->identity->username  ,
                                'url' => \yii\helpers\Url::toRoute(['/user/settings/profile']),
                                'template' => '<a href="{url}" data-method="post">{label}</a>']
//
                            )
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