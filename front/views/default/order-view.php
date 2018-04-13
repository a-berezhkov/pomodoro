<?php
/**
 * @var $model \app\front\models\Orders
 * @var $cart \app\front\models\Cart
 */

use yii\helpers\Html;
use yii\helpers\VarDumper;

?>

<? //VarDumper::dump($model->carts, 10, true) ?>
<?php
/**
 * @var $item \app\front\models\Store
 */

$this->title                   = Yii::t('user', 'Cart');
$this->params['breadcrumbs'][] = $this->title;


?>
<h1>Заказ № <?= $model->id, ' (', $model->unique_code, ') от ', date_format(date_create($model->created_at), 'd-m-Y')
    ?></h1>
<h2>Статус заказа: <?= $model->deliveryStatus->name ?></h2>
<div class="page page-cart">
    <div class="row">
        <div class="col-md-12">
            <div class="form bordered">
                <h2 class="section-name">«Горячие предложения»</h2>

                    <div id="hot">

                        <table class="table table-products">
                            <tr class="row heading">
                                <td class="col-md-4 text-center">
                                    Наименование
                                </td>

                                <td class="col-md-2 text-center">
                                    Количество
                                </td>
                                <td class="col-md-2 text-center">
                                    Вес шт/всего
                                </td>
                                <td class="col-md-2 text-center">
                                    Цена
                                </td>
                                <td class="col-md-2 text-center">
                                    Сумма
                                </td>
                            </tr>

                            <? foreach ($model->carts as $cart) : ?>
                                <? if ($cart->is_sale == true) : ?>
                                    <tr>
                                        <td class="col-md-2 text-center"><?= Html::img
                                            (\Yii::$app->imagemanager->getImagePath($cart->store->logo_id, '100', '70', 'inset'));
                                            ?></td>
                                        <td class="col-md-2 text-center"><?= $cart->store->name; ?></td>
                                        <td class="col-md-2 text-center"><?= $cart->count; ?></td>
                                        <td class="col-md-2 text-center"><?= $cart->store->box_weight, '/', $cart->store->box_weight * $cart->count; ?></td>
                                        <td class="col-md-2 text-center"><?= $cart->store->discount_box_price; ?></td>
                                        <td class="col-md-2 text-center"><?= $cart->sum; ?></td>
                                    </tr>
                                <? endif; ?>
                            <? endforeach; ?>
                        </table>
                    </div>

                    <h2 class="section-name">«Стандартные товары»</h2>
                <div class="row heading">

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
                                <? if ($cart->is_sale == 0) : ?>
                                    <tr>
                                        <td class="col-md-2 text-center"><?= Html::img
                                            (\Yii::$app->imagemanager->getImagePath($cart->store->logo_id, '100', '70', 'inset'));
                                            ?></td>
                                        <td class="col-md-2 text-center"><?= $cart->store->name; ?></td>
                                        <td class="col-md-2 text-center"><?= $cart->count; ?></td>
                                        <td class="col-md-2 text-center"><?= $cart->store->box_weight, '/', $cart->store->box_weight * $cart->count; ?></td>
                                        <td class="col-md-2 text-center"><?= $cart->store->box_price; ?></td>
                                        <td class="col-md-2 text-center"><?= $cart->sum; ?></td>
                                    </tr>
                                <? endif; ?>
                            <? endforeach; ?>
                        </table>
                    </div>

                <div id="total">

                </div>
                <? if($model->delivery_status != 6) : ?>
                <?= Html::a('Отменить заказ', \yii\helpers\Url::toRoute(['/front/orders/drop-order',
                                                                         'id'=>$model->id]), [
                    'onclick'=> 'confirm("Вы действительно хотите это сделать?")',
                    'class' => ' btn btn-primary',
                ]) ?>
                <? endif; ?>
            </div>
        </div>
    </div>


</div>