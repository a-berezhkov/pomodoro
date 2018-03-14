<?php

use yii\helpers\Html;

/**
 * @var $category \app\front\models\Categories
 * @var $categories object \app\front\models\Categories
 */

$counterRow = 0;  //Счетчик для строк
$countPerRow = 4; //Количество колонок в одной строке
?>

<? foreach ($categories as $category) : ?>
    <?= $counterRow % $countPerRow == 0 ? '<div class="row">' : null; ?>
    <? $counterRow++; ?>

    <? if ($category->position == 'right'): ?>

        <div class="category category-right">
<!--            <div class="product add">-->
                <div class="details">
                    <div class="category-icon <?= $category->icon ?>"></div>
                    <div class="name text-center"><?= $category->name ?></div>
                </div>
                <?= Html::img(\Yii::$app->imagemanager->getImagePath($category->image_id, '440', '190', 'inset')); ?>
<!--            </div>-->
        </div>
    <?php endif; ?>
    <?= $counterRow % $countPerRow == 0 ? '</div>' : null; ?>
<?php endforeach; ?>