<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BalanceSheet;

/**
 * BalanceSheetSearch represents the model behind the search form of `backend\models\BalanceSheet`.
 */
class BalanceSheetSearch extends BalanceSheet
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bal_sheet_id'], 'integer'],
            [['user_name', 'password', 'date', 'status'], 'safe'],
            [['total_income', 'total_expense', 'current_balance'], 'number'],
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
        $query = BalanceSheet::find();

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
            'bal_sheet_id' => $this->bal_sheet_id,
            'date' => $this->date,
            'total_income' => $this->total_income,
            'total_expense' => $this->total_expense,
            'current_balance' => $this->current_balance,
        ]);

        $query->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
