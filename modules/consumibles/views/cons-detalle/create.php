<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\consumibles\models\ConsDetalle */

$this->title = 'Create Cons Detalle';
$this->params['breadcrumbs'][] = ['label' => 'Cons Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<br>
<br>
<div class="box box-default">
   <div class="box-header with-border">
        <h3 class="box-title"><i class="glyphicon glyphicon-cog"></i>Agregar Item</h3>
   </div>
   <div class="box-body">
   <div class="box-body table-responsive">

 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
