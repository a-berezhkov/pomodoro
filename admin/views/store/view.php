<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\front\models\Store */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'boxes_count',
            'box_weight',
            'box_price',
            'desc:ntext',
	        [
		        'attribute' => 'logo_id',
		        'value'     =>  Yii::$app->imagemanager->getImagePath( $model->logo_id, '200', '200', 'outbound' ),
		        'format' => ['image',['width'=>'100','height'=>'100']],
	        ],
	        [
		        'attribute' => 'country_id',
                'value' => $model->country->name,
            ],
	        [
		        'attribute' => 'category_id',
		        'value' => $model->category->name,
	        ],
            'is_sale',
            'is_active',
	        [
		        'attribute' => 'created_by',
		        'value' => $model->profile->fullName,
	        ],
	        [
		        'attribute' => 'updated_by',
		        'value' => $model->profile->fullName,
	        ],

            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
