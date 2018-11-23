<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\NewPurchase */

$this->title = Yii::t('app', 'Update IMEI: ' . $model->IMEI, [
    'nameAttribute' => '' . $model->seller_name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'New Purchases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->purchase_id, 'url' => ['view', 'id' => $model->purchase_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="new-purchase-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
