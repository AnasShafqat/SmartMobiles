<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BalanceSheet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="balance-sheet-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'user_name')->textInput(['maxlength' => true])?>
        </div>   
        <div class="col-md-6">
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>            
        </div>
    </div>




    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <div class="row invisible">
        <div class="col-md-4">
            <?= $form->field($model, 'date')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'total_income')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'total_expense')->textInput() ?>
        </div>
    </div>
    <div class="row invisible">
        <div class="col-md-4">
            <?= $form->field($model, 'current_balance')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
