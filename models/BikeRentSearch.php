<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BikeRent;

/**
 * BikeRentSearch represents the model behind the search form about `app\models\BikeRent`.
 */
class BikeRentSearch extends BikeRent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'bike_fk', 'customer_fk', 'admin_fk', 'status'], 'integer'],
            [['start_from', 'end_to', 'purpose'], 'safe'],
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
        $query = BikeRent::find();

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
            'bike_fk' => $this->bike_fk,
            'customer_fk' => $this->customer_fk,
            'admin_fk' => $this->admin_fk,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'start_from', $this->start_from])
            ->andFilterWhere(['like', 'end_to', $this->end_to])
            ->andFilterWhere(['like', 'purpose', $this->purpose]);

        return $dataProvider;
    }
}
