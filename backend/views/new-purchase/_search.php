<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\NewPurchaseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="new-purchase-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'globalSearch') ?>


    <?php // echo $form->field($model, 'date_of_purchase') ?>

    <?php // echo $form->field($model, 'cnic_front_pic') ?>

    <?php // echo $form->field($model, 'cnic_back_pic') ?>

    <?php // echo $form->field($model, 'cell_phone_front_pic') ?>

    <?php // echo $form->field($model, 'cell_phone_back_pic') ?>

    <?php // echo $form->field($model, 'cell_phone_brand') ?>

    <?php // echo $form->field($model, 'cell_phone_model') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
