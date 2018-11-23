<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datetimepicker\DateTimePicker;
use backend\models\NewPurchase;
use backend\models\Income;

/* @var $this yii\web\View */
/* @var $model backend\models\NewSale */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="new-sale-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'purchase_id')->dropDownList(
                ArrayHelper::map(NewPurchase::find()->where(['status'=>'Active'])->all(),'purchase_id','IMEI'),
                ['prompt'=>'','id' => 'purchaseID']
            )?>     
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'cell_phone_brand')->textInput(['id' => 'cellPhoneBrand', 'readonly' => true, 'onchange' => 'setPhoneBrand();']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'cell_phone_model')->textInput(['maxlength' => true, 'id' => 'cellPhoneModel', 'readonly' => true, 'onchange' => 'setPhoneBrand();']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'customer_contact_no')->widget(yii\widgets\MaskedInput::class, [
                'mask' => '+99-999-9999999',
                ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'sale_price')->textInput(['maxlength' => 6, 'id' => 'saleAmount' , 'onchange' => 'setAmount();']) ?>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-4">
            <label>Selling Date</label>
            <?= DateTimePicker::widget([
                    'model' => $model,
                    'attribute' => 'date_of_sale',
                    'language' => 'en',
                    'size' => 'ms',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd HH:ii:ss',
                        'todayBtn' => true,
                    ]
                ]);?>
        </div>
        <div class="col-md-4 invisible">
            <?= $form->field($model, 'created_at')->textInput() ?>
        </div>
        <div class="col-md-4 invisible">
            <?= $form->field($model, 'updated_at')->textInput() ?>
        </div>
    </div>    
    
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <div class="row invisible">
        <div class="col-md-4">
            <?= $form->field($income, 'income_name')->textInput(['maxlength' => true, 'id' => 'incomeName']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($income, 'amount')->textInput(['id' => 'incomeAmount']) ?>
        </div>
    </div>
       
    <?php ActiveForm::end(); ?>

</div>


<!-- AJAX Request for set cell_phone_brand and cell_phone_model start...! -->
<?php
$url = \yii\helpers\Url::to("new-sale/ajax-request-newpurchase");

$script = <<< JS
$('#purchaseID').on('change',function(){
   var purchaseID = $('#purchaseID').val();
    $.ajax({
        type:'POST',
        data:{purchaseID:purchaseID},
        url: "$url",
        success:function(result){
            var jsonResult = JSON.parse(result.substring(result.indexOf('{'), result.indexOf('}') + 1));

            var cellPhoneBrand = jsonResult.cell_phone_brand;
            var cellPhoneModel = jsonResult.cell_phone_model;
            $('#cellPhoneBrand').val(cellPhoneBrand);  
            $('#cellPhoneModel').val(cellPhoneModel);
            
        }         
    });         
});

JS;
$this->registerJs($script);
?>
<!-- AJAX Request for set cell_phone_brand and cell_phone_model close...! -->