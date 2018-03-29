<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>

<?= Html::a('Ваша корзина',Url::toRoute('/front/cart/cart'),['class'=>'', 'disabled' => isset($cart) ?
    false : true]) ?>
<?= Html::a('Доставка',Url::toRoute('/front/cart/delivery'),['class'=>'', 'disabled' => isset
($delivery) ? false : true]) ?>
<?= Html::a('Выбор оплаты',Url::toRoute('/front/cart/payment'),['class'=>'','disabled' => true]) ?>
<?= Html::a('Подтверждение','',['class'=>'','disabled' => true]) ?>
