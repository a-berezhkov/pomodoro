<?php
/**
 * @var $model \app\front\models\Orders
 * @var $cart \app\front\models\Cart
 */

use yii\helpers\Html;
use yii\helpers\VarDumper;

?>

<? // VarDumper::dump($model->carts, 10, true) ?>
<?php
/**
 * @var $item \app\front\models\Store
 */

$this->title                   = Yii::t('user', 'Cart');
$this->params['breadcrumbs'][] = $this->title;


?>
<h2>Заказ № <?= $model->id,' (' ,$model->unique_code , ') от ', date_format(date_create($model->created_at), 'd-m-Y')
    ?></h2>
<div class="page page-cart">
    <div class="row">
        <div class="col-md-12">
            <div class="form bordered">
                <h2 class="section-name">«Горячие предложения»</h2>
                <div class="row heading">
                    <div class="col-md-4 text-center">
                        Наименование
                    </div>

                    <div class="col-md-2 text-center">
                        Количество
                    </div>
                    <div class="col-md-2 text-center">
                        Вес шт/всего
                    </div>
                    <div class="col-md-2 text-center">
                        Цена
                    </div>
                    <div class="col-md-2 text-center">
                        Сумма
                    </div>
                </div>
                <? if (\yii\helpers\ArrayHelper::isSubset(['is_sale' => 1],$model->carts )) :?>
                <div id="hot">
                    <table class="table table-products">
                        <? foreach ($model->carts as $cart) : ?>
                        <? if ($cart->is_sale == true) : ?>
                            <tr>
                                <td class="col-md-2 text-center"><?= Html::img
                                (\Yii::$app->imagemanager->getImagePath($cart->store->logo_id, '100', '70', 'inset'));
                                ?></td>
                                <td class="col-md-2 text-center"><?= $cart->store->name; ?></td>
                                <td class="col-md-2 text-center"><?= $cart->count; ?></td>
                                <td class="col-md-2 text-center"><?= $cart->store->box_weight,'/',$cart->store->box_weight*$cart->count; ?></td>
                                <td class="col-md-2 text-center"><?= $cart->store->discount_box_price; ?></td>
                                <td class="col-md-2 text-center"><?= $cart->sum; ?></td>
                            </tr>
                        <? endif; ?>
                        <? endforeach; ?>
                    </table>
                </div>
                <? endif; ?>
                <? if (\yii\helpers\ArrayHelper::isSubset(['is_sale' => 0],$model->carts )) :?>
                <h2 class="section-name">«Стандартные товары»</h2>
                <div class="row">

                    <div class="col-md-1">
                    </div>
                    <div class="col-md-2">
                        Фотография
                    </div>
                    <div class="col-md-3">
                        Наименование
                    </div>
                    <div class="col-md-2">
                        Количество
                    </div>
                    <div class="col-md-2">
                        Вес
                    </div>
                    <div class="col-md-2">
                        Цена
                    </div>
                </div>

                <div id="ordinary">

                    <table class="table table-products">
                        <? foreach ($model->carts as $cart) : ?>
                            <? if ($cart->is_sale == true) : ?>
                                <tr>
                                    <td class="col-md-2 text-center"><?= Html::img
                                        (\Yii::$app->imagemanager->getImagePath($cart->store->logo_id, '100', '70', 'inset'));
                                        ?></td>
                                    <td class="col-md-2 text-center"><?= $cart->store->name; ?></td>
                                    <td class="col-md-2 text-center"><?= $cart->count; ?></td>
                                    <td class="col-md-2 text-center"><?= $cart->store->box_weight,'/',$cart->store->box_weight*$cart->count; ?></td>
                                    <td class="col-md-2 text-center"><?= $cart->store->box_price; ?></td>
                                    <td class="col-md-2 text-center"><?= $cart->sum; ?></td>
                                </tr>
                            <? endif; ?>
                        <? endforeach; ?>
                    </table>
                </div>
                <? endif; ?>
                <div id="total">

                </div>

                <?= Html::a('Оформить', \yii\helpers\Url::toRoute(['/front/cart/delivery']), ['id'    => 'btn-checkout',
                                                                                              'class' => ' btn btn-primary',
                ]) ?>
            </div>
        </div>
    </div>


</div>