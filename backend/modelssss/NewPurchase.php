<?php

namespace backend\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "new_purchase".
 *
 * @property int $purchase_id
 * @property int $IMEI
 * @property string $seller_name
 * @property int $seller_contact_no
 * @property int $purchase_price
 * @property string $date_of_purchase
 * @property string $cnic_front_pic
 * @property string $cnic_back_pic
 * @property string $cell_phone_front_pic
 * @property string $cell_phone_back_pic
 * @property string $cell_phone_brand
 * @property string $cell_phone_model
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class NewPurchase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'new_purchase';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IMEI', 'seller_name', 'seller_contact_no', 'purchase_price', 'date_of_purchase'],   'required'],
            [['IMEI', 'purchase_price', 'created_by', 'updated_by'], 'integer'],
            [['date_of_purchase', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['cell_phone_brand','seller_contact_no',], 'string'],
            [['seller_name'], 'string', 'max' => 30],
            [['cnic_front_pic', 'cnic_back_pic', 'cell_phone_front_pic', 'cell_phone_back_pic'], 'string', 'max' => 200],
            [['cell_phone_model'], 'string', 'max' => 64],
            [['cnic_front_pic', 'cnic_back_pic', 'cell_phone_front_pic', 'cell_phone_back_pic'], 'image', 'extensions' => 'jpg'],

    ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'purchase_id' => Yii::t('app', 'Purchase ID'),
            'IMEI' => Yii::t('app', 'IMEI'),
            'seller_name' => Yii::t('app', 'Seller Name'),
            'seller_contact_no' => Yii::t('app', 'Seller Contact No'),
            'purchase_price' => Yii::t('app', 'Purchase Price'),
            'date_of_purchase' => Yii::t('app', 'Date Of Purchase'),
            'cnic_front_pic' => Yii::t('app', 'Cnic Front Pic'),
            'cnic_back_pic' => Yii::t('app', 'Cnic Back Pic'),
            'cell_phone_front_pic' => Yii::t('app', 'Cell Phone Front Pic'),
            'cell_phone_back_pic' => Yii::t('app', 'Cell Phone Back Pic'),
            'cell_phone_brand' => Yii::t('app', 'Cell Phone Brand'),
            'cell_phone_model' => Yii::t('app', 'Cell Phone Model'),
            // 'created_at' => Yii::t('app', 'Created At'),
            // 'updated_at' => Yii::t('app', 'Updated At'),
            // 'created_by' => Yii::t('app', 'Created By'),
            // 'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    public function getCnicFrontPicInfo(){
        $path = Url::to('@web/uploads/');
        $url = Url::to('@web/uploads/');
        $filename = strtolower($this->purchase_id).'_CnicFrontPic'.'.jpg';
        $alt = $this->purchase_id."'s image not exist!";

        $imageInfo = ['alt'=>$alt];

        if(file_exists($path.$filename)){
            $imageInfo['url'] = $url.'default.jpg';
        }  else {
            $imageInfo['url'] = $url.$filename; 
        }
        return $imageInfo;
    }

    public function getCnicBackPicInfo(){
        $path = Url::to('@web/uploads/');
        $url = Url::to('@web/uploads/');
        $filename = strtolower($this->purchase_id).'_CnicBackPic'.'.jpg';
        $alt = $this->purchase_id."'s image not exist!";

        $imageInfo = ['alt'=>$alt];

        if(file_exists($path.$filename)){
            $imageInfo['url'] = $url.'default.jpg';
        }  else {
            $imageInfo['url'] = $url.$filename; 
        }
        return $imageInfo;
    }

    public function getCellPhoneFrontPicInfo(){
        $path = Url::to('@web/uploads/');
        $url = Url::to('@web/uploads/');
        $filename = strtolower($this->purchase_id).'_CellFrontPic'.'.jpg';
        $alt = $this->purchase_id."'s image not exist!";

        $imageInfo = ['alt'=>$alt];

        if(file_exists($path.$filename)){
            $imageInfo['url'] = $url.'default.jpg';
        }  else {
            $imageInfo['url'] = $url.$filename; 
        }
        return $imageInfo;
    }

    public function getCellPhoneBackPicInfo()
    {
        $path = Url::to('@web/uploads/');
        $url = Url::to('@web/uploads/');
        $filename = strtolower($this->purchase_id).'_CellBackPic'.'.jpg';
        $alt = $this->purchase_id."'s image not exist!";

        $imageInfo = ['alt'=>$alt];

        if(file_exists($path.$filename)){
            $imageInfo['url'] = $url.'default.jpg';
        }  else {
            $imageInfo['url'] = $url.$filename; 
        }
        return $imageInfo;
    }
}
