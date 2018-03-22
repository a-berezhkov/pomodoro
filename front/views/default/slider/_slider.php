<?
/**
 * @var $slide \app\front\models\Slider
 */
use yii\helpers\Html;
$slides = \app\front\models\Slider::find()->all();
?>
<div class="carousel-inner" role="listbox">
    <? foreach ($slides as $key=>$slide) : ?>
    <div class="<?= ($key == 0) ? 'item active' : 'item' ?>">
        <? ($slide->store_id == NULL)? $view = '_slide-slider': $view = '_slide-store' ?>
        <?= $this->render($view,['slide'=>$slide]) ?>
    </div>
    <? endforeach; ?>

</div>
