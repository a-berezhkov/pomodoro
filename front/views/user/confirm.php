<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

?>
<?php $form =  ActiveForm::begin([
    'id' => 'payment-form',
    'options' => ['class' => 'form-horizontal'],
    'action' => Url::to(['/front/orders/user-orders']),
    'method' => 'post'

]); ?>

<?= Html::label('Вы подтверждаете заказ?','confirm') ?>
<?=Html::checkbox('confirm',false,[
    'onchange' => '
               if ($(this).is(":checked")){
               console.log($(this).val());
                    $("#send").prop("disabled", false);
               }else {
                $("#send").prop("disabled", true);
               }
     ;'
]) ?>


<?=  \yii\helpers\Html::submitButton('Закончить оформление заказа', ['class' => 'btn btn-success','id'=>'send', 'disabled'=>'disabled']) ?>

<?  ActiveForm::end() ?>
