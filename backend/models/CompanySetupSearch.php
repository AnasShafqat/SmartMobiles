<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CompanySetup;

/**
 * CompanySetupSearch represents the model behind the search form of `backend\models\CompanySetup`.
 */
class CompanySetupSearch extends CompanySetup
{
    /**
     * {@inheritdoc}
     */

    public $globalSearch;

    public function rules()
    {
        return [
            [['company_id', 'contact_no', 'created_by', 'updated_by'], 'integer'],
            [['shop_name','globalSearch', 'owner_name', 'address', 'photo', 'created_at', 'updated_at'], 'safe'],
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
        $query = CompanySetup::find();

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
      

        $query->orFilterWhere(['like', 'shop_name', $this->globalSearch])
            ->orFilterWhere(['like', 'owner_name', $this->globalSearch])
            ->orFilterWhere(['like', 'address', $this->globalSearch])
            ->orFilterWhere(['like', 'photo', $this->photo]);

        return $dataProvider;
    }
}
