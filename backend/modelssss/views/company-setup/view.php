<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CompanySetup */

$this->title = $model->shop_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Company Setups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$photoInfo = $model->PhotoInfo;
$photo = Html::img($photoInfo['url'],['height' => '200','width' => '250'],['alt'=>$photoInfo['alt']]);
$options = ['data-lightbox'=>'profile image','data-title'=>$photoInfo['alt']];

?>
<div class="company-setup-view">

    <h1><?= Html::encode($model->shop_name) ?>'s Profile</h1>

    
    <div class="row">
        <div class="col-md-12 img-responsive">
            <figure style="img">
                <?= Html::a($photo,$photoInfo['url'],$options); ?>
                <!-- <figcaption>(Click to enlarge)</figcaption> -->
            </figure>
        </div>
    </div>
    <br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->company_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->company_id], [
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
            'company_id',
            'shop_name',
            'owner_name',
            'contact_no',
            'address',
            'photo',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
