<?php

use kartik\slider\Slider;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\front\models\StoreSearch */
/* @var $form ActiveForm */
/* @var $priceString string */
/* @var $categories  array \app\front\models\Categories */
$script = <<< JS
    $("input:checked").parent().addClass("active");
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);
?>

<div class="store-search">


    <div class="categories">


        <div class="phone-categories visible-xs-block">

            <div class="banner">
                <div class="title">Интернет-магазин</div>
            </div>


        </div>
        <h2 class="section-title hidden-xs">Поиск</h2>

            <div class="input-group">
        <?= $form->field($model,'name')->textInput(['class'=>'form-control'])->label(false)->error(false) ?>
                <span class="input-group-btn">
        <?= \yii\helpers\Html::submitButton('Найти',['onclick'=>"function() { $('form').submit() }",'class' =>'btn button']) ?>
                </span>

        </div>
        <h2 class="section-title hidden-xs">Категории</h2>

        <div class="store-categories">


            <!------- Сайл / не сейл ------------------------------------->
            <!---   Реальное значение поля, колторое передается в поисковой запрос ----->
            <input type="radio" id="real-field-is-sale" name="StoreSearch[is_sale]" value="1"
                   onclick=" $( 'form' ).submit();" hidden>

            <!---  Фейковое значение поля, благодаря которому, работует radio выбор ----->
            <div class="radio category">
                <label class="category-hot">
                    <div class="category-icon category-icon-hot"></div>
                    <div class="name">Горячие предложения</div>
                    <input type="radio" id="fake-field-is-sale" name="StoreSearch[category_id]" value="" onclick="
            $('#real-field-is-sale').attr('checked','checked');
            //console.log('#real-field-is-sale = '+ $('#real-field-is-sale').attr('checked'));
            $( 'form' ).submit();"
                        <?= (isset($_GET['StoreSearch']['category_id']) && $_GET['StoreSearch']['category_id'] == '') ? 'checked' : null ?> >
                </label>
            </div>

            <!------- END Сайл / не сейл ------------------------------------->
            <? foreach ($categories as $category) : ?>

                <div class="radio category">
                    <label class="<?= $category['icon'] ?>">
                        <div class="category-icon <?= $category['icon'] ?>"></div>
                        <div class="name"><?= $category['name'] ?></div>
                        <input type="radio" name="StoreSearch[category_id]"
                               value="<?= $category['id'] ?>"
                               onclick="$( 'form' ).submit();" <?= (isset($_GET['StoreSearch']['category_id']) && $_GET['StoreSearch']['category_id'] == $category['id']) ? 'checked' : null ?>>

                    </label>
                </div>

            <? endforeach; ?>
            <script>
                $("input:checked").parent().addClass("active");
            </script>

        </div>

        <div class="hidden-xs">

            <h2 class="section-title">Фильтр по цене</h2>

            <!--    TODO Перенести -->


            <?php

            echo Slider::widget([

                'name' => 'price',
                'value' => $priceString,
                'sliderColor' => \kartik\slider\Slider::TYPE_GREY,
                'pluginOptions' => [
                    //whether to show the tooltip on drag, hide the tooltip, or always show the tooltip.
                    // Accepts: 'show', 'hide', or 'always'
                    'tooltip' => 'show',
                    'tooltip_split' => true, // Раздельные значение для каждой точки
                    'min' => $minPrice,
                    'max' => $maxPrice,
                    'step' => 1,
                    'range' => true,

                ],
                'pluginEvents' => [
                    "slideStop" => "function() { $('form').submit() }",
                ],
            ]);

            ?>
        </div>

    </div>


</div>