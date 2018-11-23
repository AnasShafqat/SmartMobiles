<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BalanceSheet */

$this->title = $model->bal_sheet_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Balance Sheets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="balance-sheet-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'bal_sheet_id',
            'user_name',
            'password',
            'date',
            'total_income',
            'total_expense',
            'current_balance',
            'status',
        ],
    ]) ?>

</div>
