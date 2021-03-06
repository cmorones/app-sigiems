<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\MovBienesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mov-bienes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_plantel') ?>

    <?= $form->field($model, 'folio') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'area_origen') ?>

    <?php // echo $form->field($model, 'area_destino') ?>

    <?php // echo $form->field($model, 'suministro') ?>

    <?php // echo $form->field($model, 'prestamo') ?>

    <?php // echo $form->field($model, 'salida') ?>

    <?php // echo $form->field($model, 'equipo') ?>

    <?php // echo $form->field($model, 'refaccion') ?>

    <?php // echo $form->field($model, 'material') ?>

    <?php // echo $form->field($model, 'tipo_manto') ?>

    <?php // echo $form->field($model, 'actualizacion') ?>

    <?php // echo $form->field($model, 'distribucion') ?>

    <?php // echo $form->field($model, 'garantia') ?>

    <?php // echo $form->field($model, 'condiciones') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'autoriza') ?>

    <?php // echo $form->field($model, 'entrega') ?>

    <?php // echo $form->field($model, 'recibe') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
