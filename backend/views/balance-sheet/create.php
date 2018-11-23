<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BalanceSheet */

$this->title = Yii::t('app', 'Create Balance Sheet');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Balance Sheets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="balance-sheet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
