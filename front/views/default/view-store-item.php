<?php
/**
 * @var $item \app\front\models\Store
 */

use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = $item->name;
$this->params['breadcrumbs'][] = ['label' => $item->category->name];
$this->params['breadcrumbs'][] = $this->title;


$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $item->name,
]);
$this->registerMetaTag([
    'name' => 'description',
    'content' => $item->category->name . ' ' . $item->name,
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
                <div class="suggest">
                    <div class="picture text-center">
                        <?= Html::img(\Yii::$app->imagemanager->getImagePath($item->logo_id, '610', '500', 'inset')); ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="details">
                    <h1><?= $item->name ?></h1>
                    <div class="prices">
                        <? if ($item->discount_box_price) : ?>
                            <div class="price-sale"><?= $item->discount_box_price ?></div>
                            <div class="price-old"><?= $item->box_price ?></div>
                        <? else : ?>
                            <div class="price-sale"><?= $item->box_price ?></div>
                        <? endif; ?>

                    </div>
                    <div class="description"><?= $item->desc ?></div>
                    <div class="meta">
                        <div class="weigh"><?= $item->box_weight ?></div>
                        <div class="count"><?= $item->boxes_count ?></div>
                        <div class="country">Страна: <?= $item->country->name ?></div>
                    </div>
                    <div class="action">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="count">

                                    <?php
                                    if (($item->boxes_count) == 0) $box_color = 'box-icon-red';
                                    else if (($item->boxes_count) < 15) $box_color = 'box-icon-yellow';
                                    else $box_color = 'box-icon-green';
                                    ?>

                                    <div class="box-plus visible-xs-inline-block" item-id="<?= $item->id ?>">+
                                    </div>
                                    <input id="count_box_<?= $item->id ?>" type="number" name="count_box"
                                           value="1"
                                           min="1" max="100" step="1">
                                    <div class="box-minus visible-xs-inline-block" item-id="<?= $item->id ?>">-
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-offset-1">
                                <?= Html::button('В корзину',
                                    [
                                        'class' => 'btn button button-basket',
                                        'item-id' => $item->id,
                                        'item-name' => $item->name,
                                        'item-box_price' => $item->box_price,
                                        'item-box_weight' => $item->box_weight,
                                        'item-discount_box_price' => $item->discount_box_price,
                                        'item-image_link' => \Yii::$app->imagemanager->getImagePath($item->logo_id, '440', '190', 'inset'),
                                        'item-is_sale' => $item->is_sale,
                                    ])
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <h2 class="text-center" style="font-size: 28px; margin-bottom: 26px">Похожие товары</h2>

    <? Pjax::begin(); ?>
    <?= $this->render('store/recommendation', ['dataProvider' => $dataProvider]) ?>
    <? Pjax::end(); ?>
