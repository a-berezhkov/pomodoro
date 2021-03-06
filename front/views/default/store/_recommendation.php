<?
/**
 * @var $model \app\front\models\Store;
 */

use yii\helpers\Html;

?>

<div class="products-grid">


    <div class="suggest">
        <div class="picture text-center">
            <a href="<?= \yii\helpers\Url::toRoute(['/front/default/single-store-view', 'id' =>
                $model->id]) ?>" data-pjax="0">
            <?= Html::img(\Yii::$app->imagemanager->getImagePath($model->logo_id, '440', '190', 'inset')); ?>
            </a>
        </div>
        <div class="name text-center">
            <?= $model->name ?>
        </div>

        <div class="details">

            <div class="row">

                <div class="col-xs-12 col-md-6">
                    <div class="row current-suggestion">


                        <div class="old-price text-center">
                            <div class="col-xs-6 col-md-6">
                                <div class="count">

                                    <?php
                                    if (($model->boxes_count) == 0) $box_color = 'box-icon-red';
                                    else if (($model->boxes_count) < 15) $box_color = 'box-icon-yellow';
                                    else $box_color = 'box-icon-green';
                                    ?>


                                    <div class="box-minus visible-xs-inline-block" item-id="<?= $model->id ?>">-
                                    </div>
                                    <input id="count_box_<?= $model->id ?>" type="number" name="count_box"
                                           value="1"
                                           min="1" max="100" step="1">
                                    <div class="box-plus visible-xs-inline-block" item-id="<?= $model->id ?>">+
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <div class="weight"><?= $model->box_weight ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6 col-price">
                    <div class="new-price text-center">
                        <div class="price"><?= $model->discount_box_price ? $model->discount_box_price : (int) $model->box_price  ?> ???</div>
                    </div>
                </div>


                <div class="col-xs-12 col-md-12 col-cart">
                    <?= Html::button('?? ??????????????',
                        [
                            'class' => 'btn button button-basket',
                            'item-id' => $model->id,
                            'item-name' => $model->name,
                            'item-box_price' => $model->box_price,
                            'item-box_weight' => $model->box_weight,
                            'item-discount_box_price' => $model->discount_box_price,
                            'item-image_link' => \Yii::$app->imagemanager->getImagePath($model->logo_id, '440', '190', 'inset'),
                            'item-is_sale' => $model->is_sale,
                        ])
                    ?>
                </div>
            </div>
        </div>

    </div>
</div>
