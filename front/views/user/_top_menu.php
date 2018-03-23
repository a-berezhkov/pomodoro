<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>

<?= Html::a('Ваша корзина',Url::toRoute('/front/cart/cart'),['class'=>' btn btn-primary', 'disabled' => isset($cart) ?
    false : true]) ?>
<?= Html::a('Доставка',Url::toRoute('/front/cart/delivery'),['class'=>' btn btn-primary', 'disabled' => isset
($delivery) ? false : true]) ?>
<?= Html::a('Выбор оплаты','',['class'=>' btn btn-primary','disabled' => true]) ?>
<?= Html::a('Подтверждение','',['class'=>' btn btn-primary','disabled' => true]) ?>
