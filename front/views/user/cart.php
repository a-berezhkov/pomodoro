<?php
/**
 * @var $item \app\front\models\Store
 */

use yii\helpers\Html;

$this->title = Yii::t('user', 'Cart');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('@web/js/front/cart.js', ['position' => yii\web\View::POS_END]);
?>

<div class="page page-cart">
    <div class="row">
        <div class="col-md-3">
            <?= $this->render('_menu') ?>
        </div>
        <div class="col-md-9">
            <div class="form bordered">
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->render('_top_menu', ['cart' => 'active']) ?>
                    </div>
                </div>

                <h2 class="section-name">«Горячие предложения»</h2>
<!--                <div class="row heading">-->
<!--                    <div class="col-md-4 text-center">-->
<!--                        Наименование-->
<!--                    </div>-->
<!---->
<!--                    <div class="col-md-2 text-center">-->
<!--                        Количество-->
<!--                    </div>-->
<!--                    <div class="col-md-2 text-center">-->
<!--                        Вес шт/всего-->
<!--                    </div>-->
<!--                    <div class="col-md-2 text-center">-->
<!--                        Цена-->
<!--                    </div>-->
<!--                    <div class="col-md-2 text-center">-->
<!--                        Сумма-->
<!--                    </div>-->
<!--                </div>-->

                <table class="table table-products table-heading">
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
                </table>
                <div id="hot">

                </div>

                <h2 class="section-name">«Стандартные товары»</h2>
                <table class="table table-products table-heading">
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
                </table>
                <div id="ordinary"></div>

                <div id="total">

                </div>

                <?= Html::a('Оформить', \yii\helpers\Url::toRoute(['/front/cart/delivery']), ['id'=>'btn-checkout', 'class' => ' btn btn-primary']) ?>
            </div>
        </div>
    </div>


</div>