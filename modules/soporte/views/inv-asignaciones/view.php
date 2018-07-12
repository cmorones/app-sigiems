<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvAsignaciones */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inv Asignaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inv-asignaciones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_periodo',
            'id_mes',
            'id_plantel',
            'id_area',
            'progresivo',
            'fecha',
            'estado',
            'resguardante',
            'observaciones',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
