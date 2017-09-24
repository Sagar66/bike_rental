<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bike;

/**
 * BikeSearch represents the model behind the search form about `app\models\Bike`.
 */
class BikeSearch extends Bike
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id',  'status'], 'integer'],
            [['no_plate', 'eng_num', 'brand', 'model', 'name', 'color', 'details', 'images', 'is_maintained'], 'safe'],
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
        $query = Bike::find();

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
          
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'no_plate', $this->no_plate])
            ->andFilterWhere(['like', 'eng_num', $this->eng_num])
            ->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'details', $this->details])
            ->andFilterWhere(['like', 'images', $this->images])
            ->andFilterWhere(['like', 'is_maintained', $this->is_maintained]);

        return $dataProvider;
    }
}
