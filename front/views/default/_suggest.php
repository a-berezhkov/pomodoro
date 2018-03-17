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
                    <div class="col-md-6">
                        <div class="old-price text-center">
                            <s><?= $suggest->box_price ?></s>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="meta">
                            <?= $suggest->box_weight ?> КГ
                        </div>
                    </div>

                </div>
                <div class="row new-suggestion">
                    <div class="col-md-6 special-col text-right">
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
