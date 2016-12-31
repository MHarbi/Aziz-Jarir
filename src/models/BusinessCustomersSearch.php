<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BusinessCustomers;

/**
 * app\models\BusinessCustomersSearch represents the model behind the search form about `app\models\BusinessCustomers`.
 */
 class BusinessCustomersSearch extends BusinessCustomers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id'], 'integer'],
            [['business_category'], 'safe'],
            [['gross_annual_income'], 'number'],
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
        $query = BusinessCustomers::find();

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
            'gross_annual_income' => $this->gross_annual_income,
        ]);

        $query->andFilterWhere(['like', 'business_category', $this->business_category]);

        return $dataProvider;
    }
}
