<?php
/**
 * @var $item \app\front\models\Store
 */

use yii\helpers\Html;

$this->title = 'Корзина'; //Yii::t('user', 'Cart');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('@web/js/front/cart.min.js', ['position' => yii\web\View::POS_END]);
?>

<div class="page page-personal page-cart">
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

                <div id="hot"></div>
                <div style="overflow-x: auto">
                    <div id="hot_table"></div>
                </div>
                <div id="hot_price"></div>

                <h2 class="section-name">«Стандартные товары»</h2>

                <div id="ordinary"></div>
                <div style="overflow-x: auto">
                    <div id="ordinary_table"></div>
                </div>
                <div id="ordinary_price"></div>

                <div id="total">

                </div>

                <?= Html::a('Оформить', \yii\helpers\Url::toRoute(['/front/cart/delivery']), ['id' => 'btn-checkout', 'class' => ' btn btn-primary']) ?>
            </div>
        </div>
    </div>


</div>