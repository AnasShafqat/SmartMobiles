<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\NewSale */

$this->title = Yii::t('app', 'Create New Sale');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'New Sales'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="new-sale-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
