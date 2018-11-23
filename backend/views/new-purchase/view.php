<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\NewPurchase */

$this->title = $model->purchase_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'New Purchases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$cnicFrontPicInfo = $model->CnicFrontPicInfo;
$cnicFrontPic = Html::img($cnicFrontPicInfo['url'],['height' => '200','width' => '250'],['alt'=>$cnicFrontPicInfo['alt']]);
$option1 = ['data-lightbox'=>'profile image','data-title'=>$cnicFrontPicInfo['alt']];

$cnicBackPicInfo = $model->CnicBackPicInfo;
$cnicBackPic = Html::img($cnicBackPicInfo['url'],['height' => '200','width' => '250'],['alt'=>$cnicBackPicInfo['alt']]);
$option2 = ['data-lightbox'=>'profile image','data-title'=>$cnicBackPicInfo['alt']];

$cellPhoneFrontPicInfo = $model->CellPhoneFrontPicInfo;
$cellPhoneFrontPic = Html::img($cellPhoneFrontPicInfo['url'],['height' => '200','width' => '250'],['alt'=>$cellPhoneFrontPicInfo['alt']]);
$option3 = ['data-lightbox'=>'profile image','data-title'=>$cellPhoneFrontPicInfo['alt']];

$cellPhoneBackPicInfo = $model->CellPhoneBackPicInfo;
$cellPhoneBackPic = Html::img($cellPhoneBackPicInfo['url'],['height' => '200','width' => '250'],['alt'=>$cellPhoneBackPicInfo['alt']]);
$option4 = ['data-lightbox'=>'profile image','data-title'=>$cellPhoneBackPicInfo['alt']];

?>
<div class="new-purchase-view">


    <figure>
    <div class="row">
        <div class="col-md-3 text-center img-thumbnail">
            <b>Cnic Front Pic</b><br>
            <?= Html::a($cnicFrontPic,$cnicFrontPicInfo['url'],$option1); ?>
        </div>
        <div class="col-md-3 text-center img-thumbnail">
            <b>Cnic Back Pic</b><br>
            <?= Html::a($cnicBackPic,$cnicBackPicInfo['url'],$option2); ?>
        </div>
        <div class="col-md-3 text-center img-thumbnail">
            <b>Cell Phone Front Pic</b><br>
             <?= Html::a($cellPhoneFrontPic,$cellPhoneFrontPicInfo['url'],$option3); ?>
        </div>
        <div class="col-md-3 text-center img-thumbnail">
             <b>Cell Phone Back Pic</b><br>
            <?= Html::a($cellPhoneBackPic,$cellPhoneBackPicInfo['url'],$option4); ?>
        </div>
    </div>

        <!-- <figcaption>(Click to enlarge)</figcaption> -->
    </figure>
    <br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->purchase_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->purchase_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'purchase_id',
            'IMEI',
            'seller_name',
            'seller_contact_no',
            'purchase_price',
            'date_of_purchase',
            //'cnic_front_pic',
            //'cnic_back_pic',
            //'cell_phone_front_pic',
            //'cell_phone_back_pic',
            'cell_phone_brand',
            'cell_phone_model',
            'status',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
