<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "balance_sheet".
 *
 * @property int $bal_sheet_id
 * @property string $user_name
 * @property string $password
 * @property string $date
 * @property double $total_income
 * @property double $total_expense
 * @property double $current_balance
 * @property string $status
 */
class BalanceSheet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'balance_sheet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_name', 'password'], 'required'],
            [['date'], 'safe'],
            [['total_income', 'total_expense', 'current_balance'], 'number'],
            [['user_name', 'password'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bal_sheet_id' => Yii::t('app', 'Balance Sheet #'),
            'user_name' => Yii::t('app', 'User Name'),
            'password' => Yii::t('app', 'Password'),
            'date' => Yii::t('app', 'Date'),
            'total_income' => Yii::t('app', 'Total Income'),
            'total_expense' => Yii::t('app', 'Total Expense'),
            'current_balance' => Yii::t('app', 'Current Balance'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
