<?php
/**
 * Страница выбора способа оплаты оплаты
 */
use yii\helpers\Url;
$script = <<< JS
   localStorage.clear();
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);
?>
<div class="row">
    <div class="col-md-3">
        <?= $this->render('_menu') ?>
    </div>

    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <?= $this->render('_top_menu', ['delivery' => 'active', 'cart' => 'active']) ?>
            </div>
        </div>
      <?php $form = \yii\bootstrap\ActiveForm::begin([
                    'id' => 'payment-form',
                    'options' => ['class' => 'form-horizontal'],
                    'action' => Url::to(['/front/cart/payment','id'=>$model->id]),
                    'method' => 'post'

                ]); ?>
        <div class="row">
            <div class="col-md-12">
                <!----- TODO http://jsfiddle.net/La8wQ/10/ --->
                <div class="cc-selector">
                    <input id="card" type="radio" name="payment" value="card" />
                    <label class="drinkcard-cc visa" for="card">Картой</label>
                    <input id="cash" type="radio" name="payment" value="cash" />
                    <label class="drinkcard-cc mastercard"for="cash">Наличные</label>
                    <input id="bill" type="radio" name="payment" value="bill" />
                    <label class="drinkcard-cc mastercard"for="bill">Безналичный расчет</label>
                </div>



        </div>
    </div>
        <?=  \yii\helpers\Html::submitButton('Продолжить', ['class' => 'btn btn-success']) ?>

        <? \yii\bootstrap\ActiveForm::end() ?>
</div>