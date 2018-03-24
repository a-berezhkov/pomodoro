<?php

namespace app\front;

/**
 * front module definition class
 */
class Front extends \yii\base\Module
{
    public $layout = 'main.php';
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\front\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        /**
         * Переписана страница ошибки
         */
        \Yii::$app->errorHandler->errorAction = '/front/default/error';

    }
}
