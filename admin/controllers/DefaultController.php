<?php

namespace app\admin\controllers;

use Yii;
use app\front\models\fPartners;
use app\admin\models\aPartners;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DefaultController implements the CRUD actions for fPartners model.
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionError(){
        return $this->render('error');
    }

    public function actionDashboard()
    {
        return $this->render('dashboard');
    }

    public function actionIndex(){
        return $this->render('index');
    }
}
