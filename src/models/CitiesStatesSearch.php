<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CitiesStates;

/**
 * app\models\CitiesStatesSearch represents the model behind the search form about `app\models\CitiesStates`.
 */
 class CitiesStatesSearch extends CitiesStates
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country', 'zip', 'city', 'state'], 'safe'],
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
        $query = CitiesStates::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'zip', $this->zip])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state]);

        return $dataProvider;
    }
}
