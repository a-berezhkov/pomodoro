<?php
/**
 * @var $slide \app\front\models\Slider
 **/
use yii\helpers\Html;

?>
<div class="item">
    <div class="product main">
        <?= Html::img(\Yii::$app->imagemanager->getImagePath($slide->image_id, '440', '190', 'inset')); ?>
        <div class="details">
            <div class="name text-center">
                <?= $slide->title ?>
            </div>
            <?= $slide->desc ?>
            <?= $slide->button_url?>
            <? if ($slide->button_url) : ?>
            <button class="btn button button-more">Подробнее</button>
            <? endif ?>
        </div>
    </div>

</div>
