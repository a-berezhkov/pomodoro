<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

?>

<?php
$this->title = 'Подтверждение заказа';
?>

<div class="page page-personal page-cart page-payment">
    <div class="row">
        <div class="col-md-3">
            <?= $this->render('_menu') ?>
        </div>

        <div class="col-md-9">
            <div class="form bordered">

                <?= $this->render('_top_menu', ['confirm' => 'active', 'cart' => 'active']) ?>


                <?php $form = ActiveForm::begin([
                    'id' => 'payment-form',
                    'options' => ['class' => 'form-horizontal'],
                    'action' => Url::to(['/front/orders/user-orders']),
                    'method' => 'post'

                ]); ?>

                <div class="section-name">
                    <?= Html::label('Вы подтверждаете заказ?', 'confirm') ?>
                    <?= Html::checkbox('confirm', false, [
                        'onchange' => '
               if ($(this).is(":checked")){
               console.log($(this).val());
                    $("#send").prop("disabled", false);
               }else {
                $("#send").prop("disabled", true);
               }
     ;'
                    ]) ?>
                </div>

                <hr>


                <?= \yii\helpers\Html::submitButton('Закончить оформление заказа', ['class' => 'btn btn-block button', 'id' => 'send', 'disabled' => 'disabled']) ?>

                <? ActiveForm::end() ?>

            </div>
        </div>
    </div>
</div>
