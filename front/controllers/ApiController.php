<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 24.03.2018
 * Time: 12:45
 */

namespace app\front\controllers;


use app\front\models\Api;
use app\front\models\user\Profile;
use yii\web\Controller;

class ApiController extends Controller
{

    /**
     * @param $q
     * @return array
     */
    public function actionGetAddressByGoogleMaps( $q ) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return Api::getPlacesByGoogleMap($q);
    }

    public function actionGetProfile(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $userId = \Yii::$app->user->id;
        if ($userId){
            return  $profile = Profile::find()->where(['user_id'=>$userId])->asArray()->one();
        } else {
            return 'Something wrong at API';
        }

    }
}