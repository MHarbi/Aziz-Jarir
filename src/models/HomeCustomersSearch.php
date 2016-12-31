<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HomeCustomers;

/**
 * app\models\HomeCustomersSearch represents the model behind the search form about `app\models\HomeCustomers`.
 */
 class HomeCustomersSearch extends HomeCustomers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id'], 'integer'],
            [['income'], 'number'],
            [['dob', 'gender', 'marriage_status'], 'safe'],
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
        $query = HomeCustomers::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'customer_id' => $this->customer_id,
            'income' => $this->income,
            'dob' => $this->dob,
        ]);

        $query->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'marriage_status', $this->marriage_status]);

        return $dataProvider;
    }
}
