<?php

use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var $category \app\front\models\Categories
 * @var $categories object \app\front\models\Categories
 */

?>

<? foreach ($categories as $category) : ?>


    <div class="col-xs-6 visible-xs-inline-block">
        <a href="<?= Url::to(['/front/default/shop', 'StoreSearch[category_id]' => $category->id]) ?>">
            <?php
            $details = explode(' ', $category->icon);
            ?>
            <div class="category category-phone">

                <div class="details">
                    <div class="category-icon <?= $category->icon ?>"></div>
                    <div class="name">

                        <?php
                        if (strlen($category->name) > 15) :
                            $names = explode(' ', $category->name);
                            echo $names[0] . ' (зам.)';
                        else:
                            echo $category->name;
                        endif
                        ?>
                    </div>
                </div>
                <?= Html::img(\Yii::$app->imagemanager->getImagePath($category->image_id, '285', '190', 'inset')); ?>

                <!--                    <div class="category-icon --><? //= $details[1] ?><!--"></div>-->
                <!--                    <div class="name">-->
                <!--                        --><? //= $category->name; ?>

                <!--                    </div>-->
            </div>
        </a>
    </div>


<?php endforeach; ?>

