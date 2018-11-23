<?php

namespace backend\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "company_setup".
 *
 * @property int $company_id
 * @property string $shop_name
 * @property string $owner_name
 * @property string $contact_no
 * @property string $address
 * @property string $photo
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class CompanySetup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_setup';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shop_name', 'owner_name', 'contact_no', 'address'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['shop_name', 'owner_name', 'contact_no', 'address'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at','created_by', 'updated_by','created_by'],'safe'],
            [['shop_name','contact_no'], 'string', 'max' => 50],
            [['owner_name'], 'string', 'max' => 30],
            [['contact_no'], 'string', 'max' => 15],
            [['address'], 'string', 'max' => 120],
            [['photo'], 'string', 'max' => 200],
            [['photo'], 'image', 'extensions' => 'jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'shop_name' => 'Shop Name',
            'owner_name' => 'Owner Name',
            'contact_no' => 'Contact No',
            'address' => 'Address',
            'photo' => 'Photo',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    public function getPhotoInfo(){
        $path = Url::to('@web/uploads/');
        $url = Url::to('@web/uploads/');
        $filename = $this->shop_name.'_photo'.'.jpg';
        $alt = $this->shop_name."'s image not exist!";

        $imageInfo = ['alt'=>$alt];

        if(file_exists($path.$filename)){
            $imageInfo['url'] = $url.'default.jpg';
        }  else {
            $imageInfo['url'] = $url.$filename; 
        }
        return $imageInfo;
    }

}
