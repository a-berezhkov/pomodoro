<?php

namespace app\front\controllers;

use app\front\models\Categories;
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
        $categories = Categories::find()->all();
        return $this->render('index',['categories'=>$categories]);
    }

    public function actionShow()
    {
        $partners = fPartners::getAll();
        VarDumper::dump($partners,10,true);
    }
}
