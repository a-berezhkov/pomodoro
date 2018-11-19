<?php
/**
 * @var $item \app\front\models\Store
 */

use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title                   = $item->name;
$this->params['breadcrumbs'][] = ['label' =>  $item->category->name];
$this->params['breadcrumbs'][] = $this->title;



$this->registerMetaTag([
    'name' => 'keywords',
    'content' =>  $item->name ,
]);
$this->registerMetaTag([
    'name' => 'description',
    'content' => $item->category->name.' '.$item->name,
]);
?>
<?=
\yii\widgets\Breadcrumbs::widget(
    [
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]
) ?>
<div class="page page-store">
    <div class="store-item">

        <div class="row">

            <div class="col-md-6">
                <div class="picture text-center">
                    <?= Html::img(\Yii::$app->imagemanager->getImagePath($item->logo_id, '440', '190', 'inset')); ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="details">
                    <h1><?= $item->name ?></h1>
                    <div class="prices">
                        <div class="price-sale"><?= $item->discount_box_price ?></div>
                        <div class="price-old"><?= $item->box_price ?></div>
                    </div>
                    <div class="description"><?= $item->desc ?></div>
                    <div class="meta">
                        <div class="weigh"><?= $item->box_weight ?></div>
                        <div class="count"><?= $item->boxes_count ?></div>
                        <div class="country"> <?= $item->country->name ?></div>
                    </div>
                    <div class="action">
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
            </div>
        </div>

    </div>

    <h2 class="text-center" style="font-size: 28px; margin-bottom: 26px">Похожие товары</h2>

    <? Pjax::begin(); ?>
    <?= $this->render('store/recommendation', ['dataProvider' => $dataProvider]) ?>
    <? Pjax::end(); ?>

</div>