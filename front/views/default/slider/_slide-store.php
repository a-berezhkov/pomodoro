<?php
/**
 * @var $slide \app\front\models\Slider
 */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="product main">
    <!--    Если фото нет, ищем берем его из товара -->
    <? $slide->image_id ? $image = $slide->image_id : $image->$slide->store->logo_id ?>
    <?= Html::img(\Yii::$app->imagemanager->getImagePath($image, '440', '190', 'inset')); ?>
    <div class="details">
        <div class="name text-center">
            <?= $slide->title ?>
        </div>
        <div class="price text-center">
            <s> <?= $slide->store->discount_box_price ?></s> <?= (int)$slide->store->box_price ?> ₽
        </div>
        <div class="description text-center">
            Цена за упаковку
            <div class="meta">
                <span class="weight"><?= $slide->store->box_weight ?></span>
                <span class="boxes"><?= $slide->store->boxes_count ?></span>
            </div>
        </div>
        <!-- TODO  изменить button на href  -->
        <button href="<?= Url::toRoute(['/front/default/single-store-view', 'id' => $slide->store->id]) ?>"
                class="btn button button-more">Подробнее
        </button>
    </div>
</div>