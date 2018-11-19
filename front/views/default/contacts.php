<?php

use rmrevin\yii\fontawesome\FA;

?>

<?php
$this->title =  'Контакты';
?>


<div class="page page-contacts">

    <div class="row">
        <div class="col-md-6">
            <h1 class="title">Контакты</h1>
            <p>Великая задача страницы контактов на сайте — соединить компанию с миром людей. Клиенты, партнёры,
                контрагенты, соискатели, СМИ — вот неполный перечень тех, кто может зайти на сайт в поисках нужной
                контактной информации.</p>
            <div class="connections">
                <div class="call">
                    <span class="call-icon"><?= FA::i('phone'); ?></span> 8-812-921-16-06
                </div>
                <div class="back">
                    <a href="" class="btn button-rounded">Обратный звонок</a>
                </div>
            </div>
            <h2 class="title">Как нас найти</h2>
            <p>198223 Санкт-Петербург, ул. Софийская, 60<br/>
                Время работы: 10-18 без выходных.</p>
        </div>
        <div class="col-md-6">
            <div class="form bordered">
                <h1 class="title">Напишите нам</h1>
                <div class="form-group">
                    <input type="text" id="" class="form-control" name="" placeholder="Ваше имя">
                </div>
                <div class="form-group">
                    <input type="text" id="" class="form-control" name="" placeholder="Электронная почта">
                </div>
                <div class="form-group">
                    <input type="text" id="" class="form-control" name="" placeholder="Номер телефона">
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="5" id="" placeholder="Сообщение"></textarea>
                </div>
                <div class="form-group text-right">
                    <button class="btn button button-action">Отправить</button>
                </div>
            </div>
        </div>
    </div>
</div>
