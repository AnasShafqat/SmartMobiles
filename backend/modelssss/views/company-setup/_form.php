<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CompanySetup */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="company-setup-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'shop_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'owner_name')->textInput(['maxlength' => true]) ?>
        </div>
       <div class="col-md-4">
            <?= $form->field($model, 'contact_no')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'photo')->fileInput() ?>

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
