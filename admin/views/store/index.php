<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\front\models\Countries;
use app\front\models\Categories;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\front\models\StoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   =  'Склад';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if(Yii::$app->session->hasFlash('success')) :?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo Yii::$app->session->getFlash('success') ;?>
    </div>
<?php endif;?>

<?php if(Yii::$app->session->hasFlash('error')) :?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo Yii::$app->session->getFlash('success') ;?>
    </div>
<?php endif;?>

<div class="store-index">

    <h1><?= Html::encode( $this->title ) ?></h1>
	<?php Pjax::begin(); ?>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div>
		<?= Html::a('Добавить наименование', [ 'create' ], [ 'class' => 'btn btn-success' ] ) ?>

    <?php
        Modal::begin([
            'header' => '<h2>Списание/добавление</h2>',
            'toggleButton' => [
                'label' => Yii::t('app', 'Списать/добавить количество'),
                'tag' => 'button',
                'class' => 'btn btn-success'
            ],
        ])
    ?>

    <div class="wrtie-off-cretae">
        <?= $this->render('_write-off', [
                'model' => $model
        ]) ?>
    </div>
    <?php Modal::end(); ?>
    </div>
	<?= GridView::widget( [
		'dataProvider' => $dataProvider,
		'filterModel'  => $searchModel,
		'columns'      => [
			[ 'class' => 'yii\grid\SerialColumn' ],

			//  'id',
			'name',
			'boxes_count',
			'box_weight',
			'box_price',
			//'desc:ntext',

			//'logo_id',

			[
				'attribute' => 'country_id',
				'value' => 'country.name',
				'filter'    => \kartik\select2\Select2::widget( [
					'model'     => $searchModel,
					'attribute' => 'country_id',
					'value'     => '',
					'data'      => ArrayHelper::map( Countries::find()->all(), 'id', 'name' ),
					'options'   => [ 'multiple' => false, 'placeholder' => 'Выбрать страну ... ' ]
				] )
			],
			[
				'attribute' => 'category_id',
				'value' => 'category.name',
				'filter'    => \kartik\select2\Select2::widget( [
					'model'     => $searchModel,
					'attribute' => 'category_id',
					'value'     => '',
					'data'      => ArrayHelper::map( Categories::find()->all(), 'id', 'name' ),
					'options'   => [ 'multiple' => false, 'placeholder' => 'Выбрать категорию....' ]
				] )
			],

			//'is_sale',
			//'is_active',
			//'created_by',
			//'updated_by',
			//'created_at',
			//'updated_at',

			[ 'class' => 'yii\grid\ActionColumn' ],
		],
	] ); ?>
	<?php Pjax::end(); ?>
</div>
