<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "new_sale".
 *
 * @property int $sale_id
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
            [['IMEI', 'customer_name', 'customer_contact_no', 'date_of_sale', 'cell_phone_brand', 'cell_phone_model', 'sale_price'], 'required'],
            [['date_of_sale', 'created_at', 'updated_at','created_by', 'updated_by'], 'safe'],
            [['cell_phone_brand'], 'string'],
            [['sale_price', 'created_by', 'updated_by'], 'integer'],
            [['IMEI', 'customer_contact_no'], 'string', 'max' => 55],
            [['customer_name'], 'string', 'max' => 30],
            [['cell_phone_model'], 'string', 'max' => 32],
            [['customer_name'],'unique','message'=>'IMEI already exist. Please try another one.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sale_id' => Yii::t('app', 'Sale ID'),
            'IMEI' => Yii::t('app', 'IMEI'),
            'IMEI' => Yii::t('app', 'IMEI'),
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
}
