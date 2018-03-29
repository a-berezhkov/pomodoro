<?php
/**
 * @var $item \app\front\models\Store
 */
use yii\widgets\ListView;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\widgets\Pjax;


?>


<div class="row">
    <div class="col-md-6">
        <?= Html::img(\Yii::$app->imagemanager->getImagePath($item->logo_id, '440', '190', 'inset')); ?>
    </div>
    <div class="col-md-6">
        <?= $item->name ?>
        <?= $item->discount_box_price ?>
        <?= $item->box_price ?>
        <?= $item->desc ?>
        <?= $item->box_weight ?>
        <?= $item->boxes_count ?>
        <?= $item->country->name ?>
        <div class="input-group spinner">
            <input type="text" id="item-count" class="form-control" value="42">
            <div class="input-group-btn-vertical">
                <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
            </div>
        </div>
        <button id="to-basket">В корзину</button>
    </div>
</div>



<h2>Рекоммендованные товары</h2>
<? Pjax::begin(); ?>

<?= $this->render('store/recommendation',['dataProvider'=>$dataProvider]) ?>

<? Pjax::end(); ?>

