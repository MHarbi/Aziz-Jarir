<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ManageRegions;

/**
 * app\models\ManageRegionsSearch represents the model behind the search form about `app\models\ManageRegions`.
 */
 class ManageRegionsSearch extends ManageRegions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ssn', 'since'], 'safe'],
            [['region_id'], 'integer'],
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
        $query = ManageRegions::find();

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
            'region_id' => $this->region_id,
            'since' => $this->since,
        ]);

        $query->andFilterWhere(['like', 'ssn', $this->ssn]);

        return $dataProvider;
    }
}
