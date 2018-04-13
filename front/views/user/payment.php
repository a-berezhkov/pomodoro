<?php
/**
 * Страница выбора способа оплаты оплаты
 */

use yii\helpers\Url;
use yii\helpers\Html;

$script = <<< JS
   localStorage.clear();
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);
?>

<div class="page page-cart page-payment">
    <div class="row">
        <div class="col-md-3">
            <?= $this->render('_menu') ?>
        </div>

        <div class="col-md-9">
            <div class="form bordered">

                <div class="row">
                    <div class="col-md-12">
                        <?= $this->render('_top_menu', ['delivery' => 'active', 'cart' => 'active']) ?>
                    </div>
                </div>

                <h2 class="section-name">Выберите способ оплаты</h2>

                <?php $form = \yii\bootstrap\ActiveForm::begin([
                    'id' => 'payment-form',
                    'options' => ['class' => 'form-horizontal'],
                    'action' => Url::to(['/front/cart/payment', 'id' => $model->id]),
                    'method' => 'post'

                ]); ?>
                <!----- TODO http://jsfiddle.net/La8wQ/10/ --->
                <div class="row cc-selector text-center">

                    <div class="col col-md-4">

                        <input id="cash" type="radio" name="payment" value="cash"/>
                        <label class="drinkcard-cc visa" for="cash">
                            <?= Html::img('@web/img/icons/p_cach.png') ?>
                        </label>
                        <div>Наличные</div>
                    </div>

                    <div class="col col-md-4">
                    <input id="card" type="radio" name="payment" value="card"/>
                    <label class="drinkcard-cc mastercard" for="card">
                        <?= Html::img('@web/img/icons/p_card.png') ?>
                    </label>
                    <div>Наличные</div>
                    </div>

                    <div class="col col-md-4">
                    <input id="bill" type="radio" name="payment" value="bill"/>
                    <label class="drinkcard-cc mastercard" for="bill">
                        <?= Html::img('@web/img/icons/p_check.png') ?>
                    </label>
                    <div>Наличные</div>
                    </div>

                </div>


                <div class="form-group text-right">
                    <?= \yii\helpers\Html::submitButton('Продолжить', ['class' => 'btn button']) ?>
                </div>
                <? \yii\bootstrap\ActiveForm::end() ?>
            </div>
        </div>
    </div>