<?php

namespace app\front\controllers;

use app\front\models\Categories;
use app\front\models\Store;
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
        $suggests = Store::find()->where(['is_active' => true, 'is_sale' => true])->all();
        return $this->render('index',
            [
                'categories' => $categories,
                'suggests' => $suggests
            ]
        );
    }

    public function actionShow()
    {
        $partners = fPartners::getAll();
        VarDumper::dump($partners, 10, true);
    }

    /**
     * Действие просмотра одного товара
     * @param $id
     * @return string
     */
    public function actionSingleStoreView($id){
        $storeItem = Store::findOne(['id'=>$id]);
        return $this->render('view-store-item',['item'=>$storeItem]);

    }
}
