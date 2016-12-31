<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Salespersons;

/**
 * app\models\SalespersonsSearch represents the model behind the search form about `app\models\Salespersons`.
 */
 class SalespersonsSearch extends Salespersons
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ssn', 'name', 'dob', 'phone', 'job_title', 'password', 'email', 'address1', 'address2', 'zip', 'country'], 'safe'],
            [['salary'], 'number'],
            [['store_id'], 'integer'],
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
        $query = Salespersons::find();

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
            'dob' => $this->dob,
            'salary' => $this->salary,
            'store_id' => $this->store_id,
        ]);

        $query->andFilterWhere(['like', 'ssn', $this->ssn])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'job_title', $this->job_title])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'address1', $this->address1])
            ->andFilterWhere(['like', 'address2', $this->address2])
            ->andFilterWhere(['like', 'zip', $this->zip])
            ->andFilterWhere(['like', 'country', $this->country]);

        return $dataProvider;
    }
}
