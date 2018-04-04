<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use app\widgets\UserMenu;

/**
 * @var dektrium\user\models\User $user
 */

$user = Yii::$app->user->identity;
?>

<?= UserMenu::widget() ?>

<p>Великая задача страницы контактов на сайте — соединить компанию с миром людей. Клиенты, партнёры, контрагенты, соискатели, СМИ — вот неполный перечень тех, кто может зайти на сайт в поисках нужной информации.</p>