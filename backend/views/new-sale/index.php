<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\NewSaleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'New Sales');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="new-sale-index">
    
    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '+ Add New Sale'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>       

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'sale_id',
            //'purchase.IMEI',
            'customer_name',
            'customer_contact_no',
            //'date_of_sale',
            'cell_phone_brand',
            'cell_phone_model',
            'sale_price',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
