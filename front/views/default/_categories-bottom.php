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
    <? if ($category->position == 'bottom'): ?>

        <?= $counterRow % $countPerRow == 0 ? '<div class="row">' : null; ?>
        <? $counterRow++; ?>

        <div class="col-md-3">
            <div class="category category-bottom">
                <div class="details">
                    <div class="category-icon <?= $category->icon ?>"></div>
                    <div class="name"><?= $category->name ?></div>
                </div>
                <?= Html::img(\Yii::$app->imagemanager->getImagePath($category->image_id, '285', '190', 'inset')); ?>
            </div>
        </div>

        <?= $counterRow % $countPerRow == 0 ? '</div>' : null; ?>

    <?php endif; ?>
<?php endforeach; ?>

