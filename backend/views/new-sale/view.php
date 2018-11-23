<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\NewSale */

$this->title = $model->sale_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'New Sales'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="new-sale-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->sale_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->sale_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>

        <?= Html::a(Yii::t('app', ' Invoice'), ['report', 'id' => $model->sale_id], ['class' => 'btn btn-warning glyphicon glyphicon-print']) ?>

    </p>

    
    <div id="hidden_div" style="display: none;">
        <img src="images/logo.jpg" width="60px" height="50px">
        <h1>DEXDEVS</h1>
    </div>
    

    <div id="print-content">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'sale_id',
                'purchase.IMEI',
                'customer_name',
                'customer_contact_no',
                'cell_phone_brand',
                'cell_phone_model',
                'sale_price',
                'date_of_sale',
                'created_at',
                'updated_at',
                'created_by',
                'updated_by',
            ],
        ]) ?>
    </div>

   <!--  <input id="btnprint" type="button" onclick="printDiv('print-content')" value="print a div!"/> -->

</div>

<script type="text/javascript">

function printDiv(divName) {
    //hidden_div
    var hideDiv = document.getElementById("hidden_div");
    hideDiv.style.visibility = "block";
    // hide print putton on print view....
    var ButtonControl = document.getElementById("btnprint");
    ButtonControl.style.visibility = "hidden";
    // show html content...
    var printContents = document.getElementById(divName).innerHTML;
    w=window.open();
    w.document.write(printContents);
    w.print();
    w.close();
}
</script>
    