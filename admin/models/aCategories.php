<?php


namespace app\admin\models;

use app\front\models\Categories;


class aCategories extends Categories
{
    /**
     * Метод формирует выпадающий список для
     * @example  http://demos.krajee.com/widget-details/select2
     * @see slider/_form
     * @return array
     *  [
     *      'Зелень' => []
     *      'Орехи' => []
     *      'Овощи заморозка' => []
     *      'Фрукты заморозка' => []
     *      'Овощи' => [
     *          2 => 'Огурцы Муромские'
     *      ]
     *      'Фрукты' => [
     *          1 => 'Томаты Бакинские'
     *      ]
     *  ]
     */
    public static function getListStores()
    {
        $list       = [];
        $categories = self::find()->with('stores')->asArray()->all();
        foreach ($categories as $category) {
            $categoryName = $category['name'];
            $storesItems  = [];
            if ($category['stores']) {
                foreach ($category['stores'] as $store) {
                    $storeId               = $store['id'];
                    $storesItems[$storeId] = $store['name'];
                }
            }
            $list[$categoryName] = $storesItems ? $storesItems : [];
        }

        return $list;
    }

}