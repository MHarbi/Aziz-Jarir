<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transactions;

/**
 * app\models\TransactionsSearch represents the model behind the search form about `app\models\Transactions`.
 */
 class TransactionsSearch extends Transactions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_number', 'customer_id', 'store_id', 'product_id', 'quantity'], 'integer'],
            [['saleperson_id', 'color', 'os', 'purchase_date'], 'safe'],
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
        $query = Transactions::find();

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
            'order_number' => $this->order_number,
            'customer_id' => $this->customer_id,
            'store_id' => $this->store_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'purchase_date' => $this->purchase_date,
        ]);

        $query->andFilterWhere(['like', 'saleperson_id', $this->saleperson_id])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'os', $this->os]);

        return $dataProvider;
    }
}
