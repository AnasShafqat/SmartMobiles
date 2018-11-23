<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\NewPurchase */

$this->title = Yii::t('app', 'Create New Purchase');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'New Purchases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="new-purchase-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'expense' => $expense,
    ]) ?>

</div>
