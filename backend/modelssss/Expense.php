<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "expense".
 *
 * @property int $expense_id
 * @property string $date
 * @property string $expense_name
 * @property int $amount
 * @property int $total_amount
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Expense extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'expense';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'expense_name', 'amount'], 'required'],
            [['date', 'total_amount', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['amount', 'total_amount', 'created_by', 'updated_by'], 'integer'],
            [['expense_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'expense_id' => Yii::t('app', 'Expense ID'),
            'date' => Yii::t('app', 'Date'),
            'expense_name' => Yii::t('app', 'Expense Name'),
            'amount' => Yii::t('app', 'Amount'),
            'total_amount' => Yii::t('app', 'Total Amount'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
