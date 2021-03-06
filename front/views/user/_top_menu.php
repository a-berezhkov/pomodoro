<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Menu;

?>

<?//= Html::a('Ваша корзина',Url::toRoute('/front/cart/cart'),['class'=>'', 'disabled' => isset($cart) ?
//    false : true]) ?>
<?//= Html::a('Доставка',Url::toRoute('/front/cart/delivery'),['class'=>'', 'disabled' => isset
//($delivery) ? false : true]) ?>
<?//= Html::a('Выбор оплаты',Url::toRoute('/front/cart/payment'),['class'=>'','disabled' => true]) ?>
<?//= Html::a('Подтверждение','',['class'=>'','disabled' => true]) ?>

<?php
$menu_items = [
    ['label' => 'Ваша корзина', 'url' => ['/front/cart/cart']],
    ['label' => 'Доставка', 'url' => ['/front/cart/delivery']],
    ['label' => 'Выбор оплаты', 'url' => ['/front/cart/payment']],
    ['label' => 'Подтверждение', 'url' => ['/front/cart/confirm']],
];
?>

<?=

Menu::widget([
    'items' => $menu_items,
    'options' => [
        'class' => 'navbar nav-horizontal',
    ],
    'itemOptions' => [
        'class' => 'menu-item'
    ],
]);

?>

