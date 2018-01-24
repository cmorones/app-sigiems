<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\MovDetalle */

$this->title = 'Update Mov Detalle: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mov Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mov-detalle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'idp' => $idp,
    ]) ?>

</div>
