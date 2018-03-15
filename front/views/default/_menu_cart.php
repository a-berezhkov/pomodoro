<?php
use yii\helpers\Html;

?>

<? foreach ($_SESSION['store'] as $item) : ?>

<?= Html::img($item['data']['item_image_link']) ?>
<?= $item['data']['item_name'] ?>
<?= $price =  $item['data']['item_discount_box_price'] ? $item['data']['item_box_price'] : $item['data']['item_box_price']   ?>
<?= $item['count'] ?>
<?= $item['data']['item_box_weight'] ?>
<?= 'Итого '.$item['count']*$price ?>

<? endforeach; ?>
