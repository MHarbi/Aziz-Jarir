<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductsOs;

/**
 * app\models\ProductsOsSearch represents the model behind the search form about `app\models\ProductsOs`.
 */
 class ProductsOsSearch extends ProductsOs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'integer'],
            [['os'], 'safe'],
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
        $query = ProductsOs::find();

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
            'product_id' => $this->product_id,
        ]);

        $query->andFilterWhere(['like', 'os', $this->os]);

        return $dataProvider;
    }
}
