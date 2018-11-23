<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Income */

$this->title = Yii::t('app', 'Update Income: ' . $model->income_id, [
    'nameAttribute' => '' . $model->income_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Incomes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->income_id, 'url' => ['view', 'id' => $model->income_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="income-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
