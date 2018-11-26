<?php

namespace app\front\controllers;

use app\front\models\Categories;
use app\front\models\fPartners;
use app\front\models\Store;
use app\front\models\StoreSearch;
use yii\data\Sort;
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
        $suggests   = Store::find()
                           ->where(['is_active' => true, 'is_sale' => true])
                           ->orderBy(['created_at' => SORT_DESC])
                           ->all();
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
        $sort = new Sort([
            'attributes' => [
                'box_price_up'   => [
                    'asc'   => ['box_price' => SORT_DESC],
                    'desc'  => ['box_price' => SORT_DESC],
                    'label' => '₽ +',
                ],
                'box_price_down' => [
                    'asc'   => ['box_price' => SORT_ASC],
                    'desc'  => ['box_price' => SORT_ASC],
                    'label' => '₽ -',
                ],
                'name_up'        => [
                    'asc'   => ['name' => SORT_ASC],
                    'desc'  => ['name' => SORT_ASC],
                    'label' => 'А-Я',
                ],
                'name_down'      => [
                    'asc'   => ['name' => SORT_DESC],
                    'desc'  => ['name' => SORT_DESC],
                    'label' => 'Я-А',

                ],
            ],
        ]);


        $searchModel  = new StoreSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['is_active'=>true]);
        $dataProvider->pagination = [
            'pageSize' => 18,
        ];

        // Если получена цена от слайлера
        if (isset(\Yii::$app->request->queryParams['price'])) {
            $priceString = \Yii::$app->request->queryParams['price'];
            $prices      = explode(",", $priceString); // парсим строку
            $minPrice    = (int)$prices[0];
            $maxPrice    = (int)$prices[1];
            // Добавлем условия поиска
            $dataProvider->query->andFilterWhere(['>=', 'box_price', $minPrice])
                                ->andFilterWhere(['<=', 'box_price', $maxPrice]);
        }
       // $dataProvider->query->andWhere(['is_sale' => false]);
        $dataProvider->query->orderBy($sort->orders);

        $categories = Categories::find()->asArray()->all();
        // Максимальная цена и минимальная цена для слайдера
        $maxPrice = (int)Store::find()
                             // ->where(['is_sale' => false])
                              ->max('box_price');
        $minPrice = (int)Store::find()
                             // ->where(['is_sale' => false])
                              ->min('box_price');
        return $this->render('store/shop', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
            'priceString'  => isset($priceString) ? $priceString : 0,
            'categories'   => $categories,
            'sort'         => $sort,
            'maxPrice'     => $maxPrice,
            'minPrice'     => $minPrice,
        ]);

    }

    /**
     * @return string
     */
    public function actionContacts()
    {
        return $this->render('contacts', [
        ]);
    }

    /**
     * @return string
     */
    public function actionError()
    {
        return $this->render('error');
    }

    /**
     * @param $q
     */
    public function actionSearchItems($q)
    {
        $items = Store::find()->where(['like', 'name', $q])->all();
        return $this->render('/default/search-result', ['items' => $items]);

    }

    /**
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about', [
        ]);
    }
}
