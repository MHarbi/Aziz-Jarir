<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FullProducts;

/**
 * app\models\FullProductsSearch represents the model behind the search form about `app\models\FullProducts`.
 */
 class FullProductsSearch extends FullProducts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'memory', 'inventory_amount'], 'integer'],
            [['pname', 'brand', 'picture', 'product_kind', 'screen', 'processor', 'color', 'os'], 'safe'],
            [['price'], 'number'],
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
        $query = FullProducts::find();

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
            'inventory_amount' => $this->inventory_amount,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'pname', $this->pname])
            ->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'product_kind', $this->product_kind])
            ->andFilterWhere(['like', 'screen', $this->screen])
            ->andFilterWhere(['like', 'processor', $this->processor])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'os', $this->os]);

        return $dataProvider;
    }
}
