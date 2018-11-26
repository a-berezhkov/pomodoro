<?php

use yii\helpers\Html;

?>

<?php
$this->title = 'О компании';
?>


<div class="page page-about">
    <h1>Условия для микрорайонов, подключенных к системе</h1>

    <div class="content">
        <?= Html::img('@web/img/oranges.jpg') ?>

            <p>1. Нет минимальной суммы заказа.</p>
            <p>2. Стоимость доставки до двери - 30 рублей</p>
            <p>3. Доставка осуществляется по определённым дням</p>


        <p> Более подробную информацию можно получить в группе Вашего менеджера микрорайона.</p>
    </div>
    <div class="features">
        <h1>Условия доставки для Санкт-Петербурга</h1>
        <p>1. Минимальная сумма заказа 1000 рублей.</p>
        <p>2. Стоимость доставки - 300 рублей
            При заказе свыше 2500 рублей доставка бесплатно.</p>
        <p>Самовывоз бесплатно по предварительной договоренности с Софийской улицы, 60.</p>


        <p> Более подробную информацию можно получить в группе Вашего менеджера микрорайона.</p>
        <div class="row">
            <div class="col-md-2 col-md-offset-2 text-center">
                <div class="feature-icon">
                    <?= Html::img('@web/img/icons/1_quality.png') ?>
                </div>
                <div class="name">Высокое качество</div>
            </div>
            <div class="col-md-2 text-center">
                <div class="feature-icon">
                    <?= Html::img('@web/img/icons/2_price.png') ?>
                </div>
                <div class="name">Низкие цены</div>
            </div>
            <div class="col-md-2 text-center">
                <div class="feature-icon">
                    <?= Html::img('@web/img/icons/3_time.png') ?>
                </div>
                <div class="name">Экономия времени</div>
            </div>
            <div class="col-md-2 text-center">
                <div class="feature-icon">
                    <?= Html::img('@web/img/icons/4_delivery.png') ?>
                </div>
                <div class="name">Удобство</div>
            </div>
        </div>
    </div>
    <div class="content">

        <h1>Условия для оптовых покупателей.</h1>
        <p>При покупке продукции тарными местами (ящик, сетка, коробка) действует оптовый прайс на всю продукцию.
            Возможна оплата безналичным платежом.
            Более подробную информацию об условиях сотрудничества с оптовыми покупателями можно получить у нашего менеджера</p>

    </div>
    <div class="content">
        <h2>Как нас найти</h2>
        <p>198223 Санкт-Петербург, Софийская ул., 60</br>Время работы: 10-18 без выходных.</p>

    </div>
</div>
