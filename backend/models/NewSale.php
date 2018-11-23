<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "new_sale".
 *
 * @property int $sale_id
 * @property int $purchase_id
 * @property string $IMEI
 * @property string $customer_name
 * @property string $customer_contact_no
 * @property string $date_of_sale
 * @property string $cell_phone_brand
 * @property string $cell_phone_model
 * @property int $sale_price
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Income[] $incomes
 * @property NewPurchase $purchase
 */
class NewSale extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'new_sale';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_name', 'customer_contact_no', 'date_of_sale', 'cell_phone_brand', 'cell_phone_model', 'sale_price'], 'required'],
            [['purchase_id', 'sale_price', 'created_by', 'updated_by'], 'integer'],
            [['purchase_id', 'date_of_sale', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['cell_phone_brand'], 'string'],
            [['customer_contact_no'], 'string', 'max' => 15],
            [['customer_name'], 'string', 'max' => 30],
            [['cell_phone_model'], 'string', 'max' => 32],
            [['purchase_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewPurchase::className(), 'targetAttribute' => ['purchase_id' => 'purchase_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sale_id' => Yii::t('app', 'Sale ID'),
            'purchase_id' => Yii::t('app', 'IMEI'),
            'customer_name' => Yii::t('app', 'Customer Name'),
            'customer_contact_no' => Yii::t('app', 'Customer Contact No'),
            'date_of_sale' => Yii::t('app', 'Date Of Sale'),
            'cell_phone_brand' => Yii::t('app', 'Cell Phone Brand'),
            'cell_phone_model' => Yii::t('app', 'Cell Phone Model'),
            'sale_price' => Yii::t('app', 'Sale Price'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncomes()
    {
        return $this->hasMany(Income::className(), ['sale_id' => 'sale_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchase()
    {
        return $this->hasOne(NewPurchase::className(), ['purchase_id' => 'purchase_id']);
    }
}
