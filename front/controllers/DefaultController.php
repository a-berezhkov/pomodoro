<?php

namespace app\front\controllers;

use yii\helpers\VarDumper;
use yii\web\Controller;
use app\front\models\fPartners;

/**
 * Default controller for the `front` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionShow()
    {
        $partners = fPartners::getAll();
        VarDumper::dump($partners,10,true);
    }
}
