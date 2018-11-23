<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Income */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="income-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'income_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'amount')->textInput() ?>
        </div>
        <div class="col-md-4">
            
            <label>Date</label>
               <?= DateTimePicker::widget([
                    'model' => $model,
                    'attribute' => 'date',
                    'language' => 'en',
                    'size' => 'ms',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd HH:ii:ss',
                        'todayBtn' => true
                    ]
                ]);?>
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
            <?= $form->field($model, 'total_amount')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'created_at')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'updated_at')->textInput() ?>
        </div>
    </div>
    
    <div class="row invisible">
        <div class="col-md-4">
            <?= $form->field($model, 'created_by')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'updated_by')->textInput() ?>
        </div>
        <div class="col-md-4 invisible">
            <?= $form->field($model, 'sale_id')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    

    <?php ActiveForm::end(); ?>

</div>
