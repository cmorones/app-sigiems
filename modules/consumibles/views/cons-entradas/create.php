<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\consumibles\models\ConsEntradas */

$this->title = 'Create Cons Entradas';
$this->params['breadcrumbs'][] = ['label' => 'Cons Entradas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-default">
   <div class="box-header with-border">
        <h3 class="box-title"><i class="glyphicon glyphicon-cog"></i>Consumibles</h3>
   </div>
   <div class="box-body">
   <div class="box-body table-responsive">
     <div class="assignment-index">
    <h1>Agregar Consumibles</h1>
<div class="col-xs-6" style="padding-top: 10px;">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
</div>
</div>
</div>
