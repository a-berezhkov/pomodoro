<?php
/**
 * @var $item \app\front\models\Store
 */

use yii\helpers\Html;

$this->title = Yii::t('user', 'Cart');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('/web//js/front/cart.js', ['position' => yii\web\View::POS_END]);
?>


<div class="row">
    <div class="col-md-3">
        <?= $this->render('_menu') ?>
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <?= $this->render('_top_menu', ['cart' => 'active']) ?>
            </div>
        </div>

        <h2>Горячие предложения </h2>
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-2">
                Фотография
            </div>
            <div class="col-md-2">
                Наименование
            </div>
            <div class="col-md-1">
                Количество
            </div>
            <div class="col-md-1">
                Вес 1 шт
            </div>
            <div class="col-md-1">
                Вес всего
            </div>
            <div class="col-md-2">
                Цена
            </div>
            <div class="col-md-2">
                Сумма
            </div>
        </div>
        <div id="hot">


        </div>
        <h2>Стандартные товары</h2>
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

        </div>

        <div id="total">

        </div>

        <?= Html::a('Оформить', ['/front/cart/delivery'], ['class' => ' btn btn-primary']) ?>
    </div>
</div>

