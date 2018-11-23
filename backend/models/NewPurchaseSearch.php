<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\NewPurchase;

/**
 * NewPurchaseSearch represents the model behind the search form of `backend\models\NewPurchase`.
 */
class NewPurchaseSearch extends NewPurchase
{
    /**
     * {@inheritdoc}
     */

    public $globalSearch;
    
    public function rules()
    {
        return [
            [['purchase_id', 'IMEI', 'seller_contact_no', 'purchase_price', 'created_by', 'updated_by'], 'integer'],
            [['seller_name', 'date_of_purchase', 'cnic_front_pic', 'cnic_back_pic', 'cell_phone_front_pic', 'cell_phone_back_pic', 'cell_phone_brand', 'cell_phone_model', 'created_at', 'updated_at'], 'safe'],
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
        $query = NewPurchase::find();

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
            'seller_contact_no' => $this->globalSearch,
        ]);

        $query->andFilterWhere(['like', 'seller_name', $this->globalSearch]);

        return $dataProvider;
    }
}
