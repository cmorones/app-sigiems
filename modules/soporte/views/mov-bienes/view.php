<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\MovBienes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mov Bienes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mov-bienes-view">

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
            'id_plantel',
            'folio',
            'fecha',
            'area_origen',
            'area_destino',
            'suministro',
            'prestamo',
            'salida',
            'equipo',
            'refaccion',
            'material',
            'tipo_manto',
            'actualizacion',
            'distribucion',
            'garantia',
            'condiciones',
            'observaciones',
            'autoriza',
            'entrega',
            'recibe',
            'estado',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
