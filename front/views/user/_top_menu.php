<?php
use yii\helpers\Html;

?>

<?= Html::a('Ваша корзина','',['class'=>' btn btn-primary', 'disabled' => $cart ? false : true]) ?>
<?= Html::a('Доставка','',['class'=>' btn btn-primary', 'disabled' => isset($delivery) ? false : true]) ?>
<?= Html::a('Выбор оплаты','',['class'=>' btn btn-primary','disabled' => true]) ?>
<?= Html::a('Подтверждение','',['class'=>' btn btn-primary','disabled' => true]) ?>
