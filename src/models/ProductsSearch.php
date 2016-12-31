<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Products;

/**
 * app\models\ProductsSearch represents the model behind the search form about `app\models\Products`.
 */
 class ProductsSearch extends Products
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'memory'], 'integer'],
            [['pname', 'brand', 'picture', 'product_kind', 'screen', 'processor'], 'safe'],
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
        $query = Products::find();

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
            'memory' => $this->memory,
        ]);

        $query->andFilterWhere(['like', 'pname', $this->pname])
            ->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'product_kind', $this->product_kind])
            ->andFilterWhere(['like', 'screen', $this->screen])
            ->andFilterWhere(['like', 'processor', $this->processor]);

        return $dataProvider;
    }
}
