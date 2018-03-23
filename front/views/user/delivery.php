<?php
/**
 * @var $item \app\front\models\Store
 */

use yii\helpers\Html;

$this->title                   = Yii::t('user', 'Delivery');
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="row">
    <div class="col-md-3">
        <?= $this->render('_menu') ?>
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <?= $this->render('_top_menu',['delivery'=>'active', ]) ?>
            </div>
        </div>


        <?= Html::a('Оформить',['/front/cart/delivery'],['class'=>' btn btn-primary','disabled' => true]) ?>
    </div>
</div>

