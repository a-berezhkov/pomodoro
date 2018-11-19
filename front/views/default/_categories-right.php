<?php

use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var $category \app\front\models\Categories
 * @var $categories object \app\front\models\Categories
 */
?>

<div class="row">

    <? foreach ($categories as $category) : ?>
        <? if ($category->position == 'right'): ?>
            <div class="col-md-12 hidden-xs">
                <a href="<?= Url::to(['/front/default/shop', 'StoreSearch[category_id]' => $category->id]) ?>">
                    <div class="category category-right">
                        <div class="details">
                            <div class="category-icon <?= $category->icon ?>"></div>
                            <div class="name text-center"><?= $category->name ?></div>
                        </div>
                        <?= Html::img(\Yii::$app->imagemanager->getImagePath($category->image_id, '440', '190', 'inset')); ?>
                    </div>
                </a>
            </div>

        <?php endif; ?>
    <?php endforeach; ?>
</div>
