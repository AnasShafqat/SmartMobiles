<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CompanySetup */

$this->title = Yii::t('app', 'Update Company Setup: ' . $model->company_id, [
    'nameAttribute' => '' . $model->shop_name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Company Setups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->company_id, 'url' => ['view', 'id' => $model->company_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="company-setup-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
