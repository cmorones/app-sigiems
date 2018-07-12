<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\AsignDetalle */

$this->title = 'Create Asign Detalle';
$this->params['breadcrumbs'][] = ['label' => 'Asign Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<br>
<div class="col-xs-12" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">

    <h1>Agregar Item</h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,
        'idp' => $idp,
    ]) ?>

</div>
</div>
</div>
