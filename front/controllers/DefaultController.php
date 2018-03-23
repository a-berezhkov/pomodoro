<?php

namespace app\front\controllers;

use app\front\models\Categories;
use app\front\models\fPartners;
use app\front\models\Store;
use app\front\models\StoreSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;
use yii\web\Controller;

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
        $suggests   = Store::find()->where(['is_active' => true, 'is_sale' => true])->all();
        return $this->render('index',
            [
                'categories' => $categories,
                'suggests'   => $suggests,
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
    public function actionSingleStoreView($id)
    {
        $storeItem                = Store::findOne(['id' => $id]);
        $searchModel              = new StoreSearch();
        $dataProvider             = $searchModel->search(\Yii::$app->request->queryParams);
        $dataProvider->pagination = [
            'pageSize' => 4,
        ];

        return $this->render('view-store-item', [
            'item'         => $storeItem,
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionShop()
    {
        $searchModel  = new StoreSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);



        $hotDataProvider = new ActiveDataProvider(
            [
                'query'      => Store::find()->where(['is_sale' => true]),
                'pagination' => [
                    'pageSize' => 4,
                ],
            ]
        );

        return $this->render('shop', [
            'searchModel'     => $searchModel,
            'dataProvider'    => $dataProvider,
            'hotDataProvider' => $dataProvider,
        ]);

    }
}
