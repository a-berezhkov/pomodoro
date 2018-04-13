<?php

use yii\widgets\ListView;

?>

<div class="page page-shop">



    <div class="assortment">
        <h2 class="section-title text-center">Основной ассортимент</h2>
        <p class="text-center">Автор неверно акцентирует внимание в своей работе на новину какой-то штуки. В статье представлены расчеты чего-нибудь, которые полностью расходятся с тем, что должно иметь место в соответствии с какой-нибудь классической теорией. </p>

        <? \yii\widgets\Pjax::begin() ?>
        <div class="row">
            <div class="col-md-3">
                <? // \yii\helpers\VarDumper::dump($dataProvider->query->all(),10,true) ?>
                <?= $this->render('store/_shop_search', ['model' => $searchModel,'priceString'=>$priceString]); ?>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <?= ListView::widget([
                        'dataProvider' => $dataProvider,

                        'itemView' => 'store/_shop_items',
                        'itemOptions' => ['class' => 'col-md-4'],
                        'options' => ['class' => 'products-grid']
                    ]); ?>
                </div>
            </div>
        </div>

        <? \yii\widgets\Pjax::end() ?>


    </div>
</div>