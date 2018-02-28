<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\consumibles\models\InvConsumibles */

$this->title = 'Update Inv Consumibles: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inv Consumibles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inv-consumibles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
