<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\NewSale;

/**
 * NewSaleSearch represents the model behind the search form of `backend\models\NewSale`.
 */
class NewSaleSearch extends NewSale
{
    /**
     * {@inheritdoc}
     */

    public $globalSearch;

    public function rules()
    {
        return [
            [['sale_id', 'IMEI', 'customer_contact_no', 'sale_price', 'created_by', 'updated_by'], 'integer'],
            [['customer_name','globalSearch', 'date_of_sale', 'cell_phone_brand', 'cell_phone_model', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = NewSale::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'IMEI' => $this->globalSearch,
        ]);

        $query->orFilterWhere(['like', 'customer_name', $this->globalSearch]);

        return $dataProvider;
    }
}
