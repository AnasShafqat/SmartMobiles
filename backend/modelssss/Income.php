<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "income".
 *
 * @property int $income_id
 * @property string $date
 * @property string $income_name
 * @property int $amount
 * @property int $total_amount
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Income extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'income';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'income_name', 'amount'], 'required'],
            [['date', 'created_at', 'updated_at', 'created_by', 'updated_by','total_amount'], 'safe'],
            [['amount', 'total_amount', 'created_by', 'updated_by'], 'integer'],
            [['income_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'income_id' => Yii::t('app', 'Income ID'),
            'date' => Yii::t('app', 'Date'),
            'income_name' => Yii::t('app', 'Income Name'),
            'amount' => Yii::t('app', 'Amount'),
            'total_amount' => Yii::t('app', 'Total Amount'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
    
    public function getMonthlyReport(){
    $monthlyRecord = Yii::$app->db->createCommand()
            ->select('income_id,date,income_name,amount,total_amount')
            ->from('income')
            ->where(['between','date', 2018-07-01 , 2018-07-31])
            ->group('date')
            ->query();
        return $monthlyRecord;
    }
}
