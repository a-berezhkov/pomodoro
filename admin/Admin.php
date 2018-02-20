<?php

namespace app\admin;

/**
 * admin module definition class
 */
class Admin extends \yii\base\Module
{
	public $layout = 'main.php';
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
