<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BalanceSheet */

$this->title = Yii::t('app', 'Update Balance Sheet: ' . $model->bal_sheet_id, [
    'nameAttribute' => '' . $model->bal_sheet_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Balance Sheets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bal_sheet_id, 'url' => ['view', 'id' => $model->bal_sheet_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="balance-sheet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
