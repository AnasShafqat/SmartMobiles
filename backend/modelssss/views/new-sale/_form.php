<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datetimepicker\DateTimePicker;
use backend\models\NewPurchase;

/* @var $this yii\web\View */
/* @var $model backend\models\NewSale */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="new-sale-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'IMEI')->widget(yii\widgets\MaskedInput::class, [
                'mask' => '999999999999999',
                ]) ?>
            <?= $form->field($model, 'purchase_id')->dropDownList(
                ArrayHelper::map(NewPurchase::find()->all(),'purchase_id','IMEI'),
                ['prompt'=>'']
            )?>    
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'customer_contact_no')->widget(yii\widgets\MaskedInput::class, [
                'mask' => '+99-999-9999999',
                ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'sale_price')->textInput(['maxlength' => 6]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'cell_phone_brand')->dropDownList([ 'nokia' => 'Nokia', 'samsung' => 'Samsung', ], ['prompt' => '']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'cell_phone_model')->textInput(['maxlength' => true]) ?>
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
                        'todayBtn' => true
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
            <?= $form->field($model, 'created_by')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'updated_by')->textInput() ?>
        </div>
    </div>
       

    

    <?php ActiveForm::end(); ?>

</div>
