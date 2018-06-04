<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\consumibles\models\ConsSalidas */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cons Salidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cons-salidas-view">

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
            'folio',
            'sfolio',
            'id_plantel_origen',
            'id_area_origen',
            'id_plantel_destino',
            'id_area_destino',
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
            'total',
            'fecha_reg',
            'observaciones',
            'autoriza',
            'entrega',
            'recibe',
            'docto',
            'estado',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
