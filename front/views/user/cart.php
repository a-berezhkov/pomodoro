<?php
/**
 * @var $item \app\front\models\Store
 */

use yii\helpers\Html;

$this->title                   = Yii::t('user', 'Cart');
$this->params['breadcrumbs'][] = $this->title;

$countDiscountBox    = 0;
$countDiscountWeight = 0;
$summaDiscount       = 0;
$countBox            = 0;
$summa               = 0;
$countWeight         = 0;
$items == NULL ? $items = [] : $items;
?>


<div class="row">
    <div class="col-md-3">
        <?= $this->render('_menu') ?>
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <?= $this->render('_top_menu',['cart'=>'active']) ?>
            </div>
        </div>


        <h2>Горячие предложения </h2>
        <? foreach ($items as $item) : ?>
            <!--        Горячие предложения -->
            <? if ($item['data']['is_sale'] == 1) : ?>
                <? $countDiscountBox += $item['count']; ?>
                <? $countDiscountWeight += $item['count'] * $item['data']['item_box_weight']; ?>
                <div class="row">
                    <div class="picture text-center">
                        <div class="col-md-1">
                            <?= \rmrevin\yii\fontawesome\FA::icon('trash') ?>
                        </div>
                        <div class="col-md-2">
                            <?= Html::img($item['data']['item_image_link']); ?>
                        </div>
                        <div class="col-md-3">
                            <?= $item['data']['item_name'] ?>
                        </div>
                        <div class="col-md-2">
                            <?= $item['count']; ?>
                        </div>
                        <div class="col-md-2">
                            <?= $item['data']['item_box_weight'] ?>
                        </div>
                        <div class="col-md-2">
                            <?= $item['data']['item_discount_box_price'] ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <? endforeach ?>
        <? if (isset($item)) : ?>
        Промежуточнный итог: <?= $summaDiscount = $item['data']['item_discount_box_price'] * $item['count'] ?>
        Количество упаковок: <?= $countDiscountBox ?>
        Общий вес (нетто): <?= $countDiscountWeight ?>
        <? endif; ?>
        <h2>Стандартные товары</h2>
        <? foreach ($items as $item) : ?>
            <? $countBox += $item['count']; ?>
            <? $countWeight += $item['count'] * $item['data']['item_box_weight']; ?>
            <!--        Горячие предложения -->
            <? if ($item['data']['is_sale'] == 0) : ?>
                <div class="row">
                    <div class="picture text-center">
                        <div class="col-md-1">
                            <?= \rmrevin\yii\fontawesome\FA::icon('trash') ?>
                        </div>
                        <div class="col-md-2">
                            <?= Html::img($item['data']['item_image_link']); ?>
                        </div>
                        <div class="col-md-3">
                            <?= $item['data']['item_name'] ?>
                        </div>
                        <div class="col-md-2">
                            <?= $item['count'] ?>
                        </div>
                        <div class="col-md-2">
                            <?= $item['data']['item_box_weight'] ?>
                        </div>
                        <div class="col-md-2">
                            <?= $item['data']['item_box_price'] ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <? endforeach ?>
        Общий итог: <?= $summaDiscount + $summa ?>
        Количество упаковок: <?= $countDiscountBox + $countBox ?>
        Общий вес (нетто): <?= $countDiscountWeight + $countWeight ?>
        <?= Html::a('Оформить',['/front/cart/delivery'],['class'=>' btn btn-primary']) ?>
    </div>
</div>

