<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\front\models\Countries;
use app\front\models\Categories;

/* @var $this yii\web\View */
/* @var $searchModel app\front\models\StoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t( 'app', 'Stores' );
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-index">

    <h1><?= Html::encode( $this->title ) ?></h1>
	<?php Pjax::begin(); ?>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
		<?= Html::a( Yii::t( 'app', 'Create Store' ), [ 'create' ], [ 'class' => 'btn btn-success' ] ) ?>
    </p>

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
					'options'   => [ 'multiple' => false, 'placeholder' => 'Select country ...' ]
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
					'options'   => [ 'multiple' => false, 'placeholder' => 'Select category ...' ]
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
