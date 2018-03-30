<?php

namespace app\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\admin\models\WriteOff;

/**
 * WriteOffSearch represents the model behind the search form of `app\admin\models\WriteOff`.
 */
class WriteOffSearch extends WriteOff
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_store', 'count_box', 'created_by', 'updated_by'], 'integer'],
            [['count_weight'], 'number'],
            [['in', 'out', 'created_at', 'updated_at'], 'safe'],
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
        $query = WriteOff::find();

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
            'id_store' => $this->id_store,
            'count_box' => $this->count_box,
            'count_weight' => $this->count_weight,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'in', $this->in])
            ->andFilterWhere(['like', 'out', $this->out]);

        return $dataProvider;
    }
}
