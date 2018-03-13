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

        // custom initialization code goes here
    }
}
