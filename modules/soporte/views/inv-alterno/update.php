<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvAlterno */

$this->title = 'Update Inv Alterno: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inv Alternos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inv-alterno-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
