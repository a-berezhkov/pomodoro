<?php
/* @var $this yii\web\View */
/* @var $searchModel \app\front\models\Store */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $priceString string */

/* @var $categories \app\front\models\Categories */

use yii\widgets\ListView;
use yii\widgets\Pjax;

?>

<?php
$this->title =  'Магазин';
?>

<div class="page page-shop">

    <div class="assortment">
        <h2 class="section-title text-center hidden-xs">Основной ассортимент</h2>
        <p class="text-center hidden-xs">  </p>


        <?php $form = \yii\bootstrap\ActiveForm::begin([
            'action'  => ['/front/default/shop'],
            'method'  => 'get',
            'options' => [
                'data-pjax' => 1,
            ],
        ]); ?>


        <div class="row">
            <div class="col-md-3">


                <?=
                /**
                 * Отображение категорий товаров
                 * и слайдера по цене
                 */
                $this->render('_shop_search', [
                    'model'       => $searchModel,
                    'priceString' => $priceString,
                    'categories'  => $categories,
                    'form'  => $form,
                    'maxPrice'     => $maxPrice,
                    'minPrice'     => $minPrice,
                ]);
                ?>

            </div>
            <?php \yii\bootstrap\ActiveForm::end(); ?>
            <div class="col-md-9">
                <?=
                /**
                 * Отображение сортировки товаров
                 */
                $this->render('_shop_sortable',[ 'sort' => $sort])
                ?>

                <div class="row">

                    <?= ListView::widget([
                        'dataProvider' => $dataProvider,
                        'beforeItem' => function ($model, $key, $index, $widget) {
                            if ($index % 3 === 0) {
                                return "<div class='row'>";
                            }
                        },
                        'itemView'    => '_shop_items',
                        'afterItem' => function ($model, $key, $index, $widget)  {
                            $content = '';
                            if (($index > 0) && ($index % 3 ==  2)  ) {
                                $content .= "</div>";
                            }
                            return $content;
                        },
                        'itemOptions' => ['class' => 'col-md-4'],
                        'options'     => ['class' => 'products-grid'],

                    ]); ?>

                </div>
            </div>
        </div>

    </div>
</div>