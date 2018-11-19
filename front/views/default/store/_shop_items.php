<?php
/**
 * @var $model \app\front\models\Store
 */

use yii\helpers\Html;

?>

<div class="suggest">
    <div class="picture text-center">
        <?= Html::img(\Yii::$app->imagemanager->getImagePath($model->logo_id, '440', '190', 'inset')); ?>
    </div>
    <div class="name text-center">
        <?= $model->name ?>
    </div>
    <div class="details">
        <div class="row current-suggestion">


            <div class="col-md-6">
                <div class="old-price text-center">
                    <?php
                    if (($model->boxes_count) == 0) $box_color = 'box-icon-red';
                    else if (($model->boxes_count) < 15) $box_color = 'box-icon-yellow';
                    else $box_color = 'box-icon-green';
                    ?>
                    <div class="box-plus visible-xs-inline-block" item-id="<?= $model->id ?>">+</div>
                    <input id="count_box_<?= $model->id ?>" type="number" name="count_box" value="1" min="1" max="100" step="1">
                    <div class="box-minus visible-xs-inline-block" item-id="<?= $model->id ?>">-</div>

                    <span class="weight"><?= $model->box_weight ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="meta">
                    <div class="new-price text-center">
                        <div class="price"><?= $model->box_price ?> ₽</div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row new-suggestion">

            <div class="col-md-12">
                <?= Html::button('В корзину',
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
