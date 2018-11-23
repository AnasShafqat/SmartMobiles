<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CompanySetup */

$this->title = $model->income_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Incomes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="income report">

    <h1><?= Html::encode($model->income_name) ?>'s Profile</h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'income_id',
            'date',
            'income_name',
            'amount',
            'total_amount',
        ],
    ]) ?>

</div>
