<?php

namespace app\front\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\front\models\Store;

/**
 * StoreSearch represents the model behind the search form of `app\front\models\Store`.
 */
class StoreSearch extends Store
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'boxes_count', 'logo_id', 'country_id', 'category_id', 'created_by', 'updated_by'], 'integer'],
            [['name', 'desc', 'is_sale', 'is_active', 'created_at', 'updated_at','maxPrice','minPrice'], 'safe'],
            [['box_weight', 'box_price','discount_box_price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Store::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);



        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'boxes_count' => $this->boxes_count,
            'box_weight' => $this->box_weight,
            'box_price' => $this->box_price,
            'logo_id' => $this->logo_id,
            'country_id' => $this->country_id,
            'category_id' => $this->category_id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'discount_box_price' => $this->discount_box_price,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'desc', $this->desc])
            ->andFilterWhere(['like', 'is_sale', $this->is_sale])
            ->andFilterWhere(['like', 'is_active', $this->is_active])
        ;
        return $dataProvider;
    }
}
