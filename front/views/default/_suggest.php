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
    <div class="col-md-3">
        <div class="suggest">
            <div class="picture text-center">
                <?= Html::img(\Yii::$app->imagemanager->getImagePath($suggest->logo_id, '440', '190', 'inset')); ?>
            </div>
            <div class="name text-center">
                <?= $suggest->name ?>
            </div>
            <div class="details">
                <div class="row current-suggestion">
                    <div class="col-md-6 special-col">
                        <div class="old-price text-center">
                            <s><?= $suggest->box_price ?></s>
                        </div>
                    </div>
                    <div class="col-md-6 special-col">
                        <div class="meta">
                            <?php
                            if (($suggest->boxes_count) == 0) $box_color = 'box-icon-red';
                            else if (($suggest->boxes_count) < 15) $box_color = 'box-icon-yellow';
                            else $box_color = 'box-icon-green';
                            ?>
                            <span class="weight"><?= $suggest->box_weight ?></span>
                            <span class="boxes <?= $box_color; ?>"><?= $suggest->boxes_count ?></span>
                        </div>
                    </div>

                </div>
                <div class="row new-suggestion">
                    <div class="col-md-6 special-col">
                        <div class="new-price text-center">
                            <div class="price"><?= $suggest->discount_box_price ?> ₽</div>
                        </div>
                    </div>
                    <div class="col-md-6 special-col">
                        <?= Html::button('В коризину',
                            [
                                    'class' => 'btn button-busket',
                                    'item-id' => $suggest->id,
                                    'item-name' => $suggest->name,
                                    'item-box_price' => $suggest->box_price,
                                    'item-box_weight' => $suggest->box_weight,
                                    'item-discount_box_price' => $suggest->discount_box_price,
                                    'item-image_link' => \Yii::$app->imagemanager->getImagePath($suggest->logo_id, '440', '190', 'inset'),
                            ])
                        ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <?= $counterRow % $countPerRow == 0 ? '</div>' : null; ?>
<? endforeach; ?>
