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
    ['label' => 'Ваша корзина', 'url' => ['/front/cart/cart'],'template'=> '<a href="#">{label}</a>'],
    ['label' => 'Доставка', 'url' => ['/front/cart/delivery'],'template'=> '<a href="#">{label}</a>'],
    ['label' => 'Выбор оплаты', 'url' => ['/front/cart/payment'],'template'=> '<a href="#">{label}</a>'],
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

