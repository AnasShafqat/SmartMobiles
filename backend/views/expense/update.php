<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Expense */

$this->title = Yii::t('app', 'Update Expense: ' . $model->expense_id, [
    'nameAttribute' => '' . $model->expense_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Expenses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->expense_id, 'url' => ['view', 'id' => $model->expense_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="expense-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
