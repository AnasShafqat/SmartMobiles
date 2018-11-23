<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;


/* @var $this yii\web\View */
/* @var $model backend\models\NewPurchase */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="new-purchase-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'IMEI')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '999999999999999', ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'seller_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'seller_contact_no')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'purchase_price')->textInput() ?>
        </div>
        <div class="col-md-4">
            <label>Date of Purchase</label>
            <?= DateTimePicker::widget([
                'model' => $model,
                'attribute' => 'date_of_purchase',
                'language' => 'en',
                'size' => 'ms',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd HH:ii:ss',
                    'todayBtn' => true
                ]
            ]);?>

        </div>
        <div class="col-md-4">
            
            <?= $form->field($model, 'cell_phone_brand')->dropDownList([ 'samsung' => 'Samsung', 'nokia' => 'Nokia', ], ['prompt' => '']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            
            <?= $form->field($model, 'cell_phone_model')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'cell_phone_front_pic')->fileInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'cell_phone_back_pic')->fileInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'cnic_front_pic')->fileInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'cnic_back_pic')->fileInput() ?>
        </div>
        <div class="col-md-4 invisible">
            <?= $form->field($model, 'created_at')->textInput() ?>
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
            <?= $form->field($model, 'updated_at')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'created_by')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'updated_by')->textInput() ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>