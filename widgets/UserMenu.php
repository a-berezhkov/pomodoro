<?php

namespace app\widgets;

use Yii;
use yii\widgets\Menu;

/**
 * Класс для расширения меню пользователя в личном кабинете
 * Class UserMenu
 * @package app\widgets
 */
class UserMenu extends \dektrium\user\widgets\UserMenu
{
    public function init()
    {
        parent::init();

        $networksVisible = count(Yii::$app->authClientCollection->clients) > 0;
        $newFields = [
            ['label' => 'Профиль', 'url' => ['/user/settings/profile'], 'options' => ['data-icon' => 'd']],
            ['label' => 'Настройки', 'url' => ['/user/settings/account'], 'options' => ['data-icon' => 'a']],
            ['label' => 'Корзина', 'url' => ['/front/cart/cart'], 'options' => ['id' => 'cart-basket', 'data-icon' => 'b']],
            ['label' => 'История заказов', 'url' => ['/front/orders/user-orders'], 'options' => ['data-icon' => 'c']],

        ];
        $this->items = $newFields;
        //$this->items = array_merge($this->items, $addFields);

    }

    /**
     * @inheritdoc
     */
    public function run()
    {

        return '<div class="sidebar">' .
            Menu::widget([
                'items' => $this->items,
                'options' => [
                    'class' => 'menu',
                ],
                //'linkTemplate' => '{url}',
                //'labelTemplate' => '',
                'encodeLabels' => true,
            ])
        . '</div>';
    }
}