<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\consumibles\models\Consumibles */

$this->title = 'Create Consumibles';
$this->params['breadcrumbs'][] = ['label' => 'Consumibles', 'url' => ['index']];
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

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
    </div>
    </div>

</div>
