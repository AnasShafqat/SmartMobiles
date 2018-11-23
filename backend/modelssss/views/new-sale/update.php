<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\NewSale */

$this->title = Yii::t('app', 'Update IMEI: ' . $model->IMEI, [
    'nameAttribute' => '' . $model->IMEI,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'New Sales'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sale_id, 'url' => ['view', 'id' => $model->sale_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="new-sale-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
