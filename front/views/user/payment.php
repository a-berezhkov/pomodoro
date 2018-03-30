<?php
/**
 * Страница выбора способа оплаты оплаты
 */
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
        <div class="row">
            <div class="col-md-4">
                Карта
            </div>
            <div class="col-md-4">
                Наличные
            </div>
            <div class="col-md-4">
         Безнал
            </div>
        </div>
    </div>
    <?= \yii\helpers\Html::a('Оформить',['/front/cart/delivery'],['class'=>' btn btn-primary']) ?>
</div>