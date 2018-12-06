<?php
/**
 * @var $suggests \app\front\models\Store
 * @var $suggest \app\front\models\Store
 */

use yii\helpers\Html;

$counterRow = 0;  //Счетчик для строк
$countPerRow = 4; //Количество колонок в одной строке
?>

<? foreach ($suggests as $suggest) : ?>
    <?= $counterRow % $countPerRow == 0 ? '<div class="row">' : null; ?>
    <? $counterRow++; ?>
    <div class="col-xs-6 col-md-3">
        <div class="suggest">
            <div class="picture text-center">
                <a href="<?= \yii\helpers\Url::toRoute(['/front/default/single-store-view', 'id' =>
                    $suggest->id]) ?>" data-pjax="0">
                <?= Html::img(\Yii::$app->imagemanager->getImagePath($suggest->logo_id, '440', '190', 'inset')); ?>
                </a>
            </div>
            <div class="name text-center">
                <?= $suggest->name ?>
            </div>
            <div class="details">

                <div class="row">

                    <div class="col-xs-12 col-md-6">
                        <div class="row current-suggestion">


                            <div class="old-price text-center">
                                <div class="col-xs-6 col-md-6">
                                    <div class="count">

                                        <?php
                                        if (($suggest->boxes_count) == 0) $box_color = 'box-icon-red';
                                        else if (($suggest->boxes_count) < 15) $box_color = 'box-icon-yellow';
                                        else $box_color = 'box-icon-green';
                                        ?>

                                        <div class="box-minus visible-xs-inline-block" item-id="<?= $suggest->id ?>">-
                                        </div>
                                        <input id="count_box_<?= $suggest->id ?>" type="number" name="count_box"
                                               value="1"
                                               min="1" max="100" step="1">
                                        <div class="box-plus visible-xs-inline-block" item-id="<?= $suggest->id ?>">+
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-6">
                                    <div class="weight"><?= $suggest->box_weight ?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-price">
                        <div class="new-price text-center">
                            <div class="price"><?= $suggest->discount_box_price ?> ₽</div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-md-12 col-cart">
                        <?= Html::button('В корзину',
                            [
                                'class' => 'btn button button-basket',
                                'item-id' => $suggest->id,
                                'item-name' => $suggest->name,
                                'item-box_price' => $suggest->box_price,
                                'item-box_weight' => $suggest->box_weight,
                                'item-discount_box_price' => $suggest->discount_box_price,
                                'item-image_link' => \Yii::$app->imagemanager->getImagePath($suggest->logo_id, '440', '190', 'inset'),
                                'item-is_sale' => $suggest->is_sale,
                            ])
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $counterRow % $countPerRow == 0 ? '</div>' : null; ?>
<? endforeach; ?>
