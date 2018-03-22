<?php
namespace app\widgets;
use Yii;

/**
 * Класс для расширения меню пользователя в личном кабинете
 * Class UserMenu
 * @package app\widgets
 */
class UserMenu extends \dektrium\user\widgets\UserMenu{
    public function init()
    {
        parent::init();

        $networksVisible = count(Yii::$app->authClientCollection->clients) > 0;
        $addFields =  [
            ['label' => Yii::t('app', 'Orders'), 'url' => ['/front/orders/view']],
            ['label' => Yii::t('app', 'Cart'), 'url' => ['/front/cart/cart']],

        ];
        $this->items = array_merge($this->items,$addFields);

    }
}