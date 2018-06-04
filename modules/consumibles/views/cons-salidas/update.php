<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\consumibles\models\ConsSalidas */

$this->title = 'Update Cons Salidas: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cons Salidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cons-salidas-update">

    <div class="col-xs-4 left-padding">
    <?= Html::a(Yii::t('app', 'Regresar'), ['salidas', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
