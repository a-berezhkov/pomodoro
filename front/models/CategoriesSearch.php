<?php

namespace app\front\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\admin\models\aCategories;

/**
 * CategoriesSearch represents the model behind the search form of `app\admin\models\aCategories`.
 */
class CategoriesSearch extends aCategories
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'image_id'], 'integer'],
            [['name', 'icon'], 'safe'],
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
        $query = aCategories::find();

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
            'image_id' => $this->image_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'position', $this->icon]);

        return $dataProvider;
    }
}
