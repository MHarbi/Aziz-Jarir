<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Stores;

/**
 * app\models\StoresSearch represents the model behind the search form about `app\models\Stores`.
 */
 class StoresSearch extends Stores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['store_id', 'region_id'], 'integer'],
            [['zip', 'country', 'address1', 'address2'], 'safe'],
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
        $query = Stores::find();

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
            'store_id' => $this->store_id,
            'region_id' => $this->region_id,
        ]);

        $query->andFilterWhere(['like', 'zip', $this->zip])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'address1', $this->address1])
            ->andFilterWhere(['like', 'address2', $this->address2]);

        return $dataProvider;
    }
}
