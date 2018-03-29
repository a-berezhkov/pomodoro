<?php

namespace app\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\admin\models\aOrders;

/**
 * aOrdersSearch represents the model behind the search form of `app\admin\models\aOrders`.
 */
class aOrdersSearch extends aOrders
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'delivery_status'], 'integer'],
            [['address_street', 'address_house', 'address_housing', 'address_office', 'address_phone', 'delivery_date', 'delivery_interval', 'created_at', 'created_by', 'dropping', 'dropping_at', 'unique_code', 'comment', 'google_id'], 'safe'],
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
        $query = aOrders::find();

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
            'delivery_date' => $this->delivery_date,
            'delivery_status' => $this->delivery_status,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'dropping_at' => $this->dropping_at,
        ]);

        $query->andFilterWhere(['like', 'address_street', $this->address_street])
            ->andFilterWhere(['like', 'address_house', $this->address_house])
            ->andFilterWhere(['like', 'address_housing', $this->address_housing])
            ->andFilterWhere(['like', 'address_office', $this->address_office])
            ->andFilterWhere(['like', 'address_phone', $this->address_phone])
            ->andFilterWhere(['like', 'delivery_interval', $this->delivery_interval])
            ->andFilterWhere(['like', 'dropping', $this->dropping])
            ->andFilterWhere(['like', 'unique_code', $this->unique_code])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'google_id', $this->google_id]);

        return $dataProvider;
    }
}
