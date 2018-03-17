<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $item \app\front\models\Store  */

?>
<div id="cart-drop">

    <? if (isset($_SESSION['store'])): ?>
        <? $total = 0 ?>

        <? foreach ($_SESSION['store'] as $item) : ?>
            <?php
            /**
             * Вычисляемые параметры
             */
                $price = $item['data']['item_discount_box_price'] ? $item['data']['item_box_price'] : $item['data']['item_box_price'];
                $sumItem = $item['count'] * $price;
                $total             += $sumItem;
            ?>
            <div class="row">
                <div class="col-md-5">
                    <?= Html::img($item['data']['item_image_link'], ['width' => '100px', 'height' => '70px']) ?>
                </div>
                <div class="col-md-7">
                    <div class="item-name">
                        <?= $item['data']['item_name'] ?>
                    </div>
                    <div class="item-box_price">
                        <?= $price ?>
                    </div>
                    <div class="item-count">
                        <?= Yii::t('app','Amount: ') ?>
                        <?= $item['count'] ?>
                    </div>
                    <div class="item-box_weigh">
                        <?= Yii::t('app','Weight of packing: ') ?>
                        <?= $item['data']['item_box_weight'] ?>
                    </div>
                    <div class="item-summa">
                        <?= 'Итого ' . $sumItem ?>
                    </div>
                </div>
            </div>
            <hr>
        <? endforeach; ?>
        <div id="cart-total">
            <?= Yii::t('app','Grand total: ') ?>
            <?= $total ?>
        </div>
        <?= Html::a(Yii::t('app', 'Cart'), Url::toRoute('/front/cart/cart/'), [
            'class' => '',
            'id'    => 'item-checkout',
        ]) ?>
        <?= Html::a(Yii::t('app', 'Checkout'), Url::toRoute('/front/cart/checkout/'), [
            'class' => '',
            'id'    => 'item-checkout',
        ]) ?>
    <? endif; ?>

</div>
