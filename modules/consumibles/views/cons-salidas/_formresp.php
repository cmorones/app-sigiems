<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\consumibles\models\ConsSalidas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cons-salidas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'folio')->textInput() ?>

    <?= $form->field($model, 'sfolio')->textInput() ?>

    <?= $form->field($model, 'id_plantel_origen')->textInput() ?>

    <?= $form->field($model, 'id_area_origen')->textInput() ?>

    <?= $form->field($model, 'id_plantel_destino')->textInput() ?>

    <?= $form->field($model, 'id_area_destino')->textInput() ?>

    <?= $form->field($model, 'suministro')->textInput() ?>

    <?= $form->field($model, 'prestamo')->textInput() ?>

    <?= $form->field($model, 'salida')->textInput() ?>

    <?= $form->field($model, 'equipo')->textInput() ?>

    <?= $form->field($model, 'refaccion')->textInput() ?>

    <?= $form->field($model, 'material')->textInput() ?>

    <?= $form->field($model, 'tipo_manto')->textInput() ?>

    <?= $form->field($model, 'actualizacion')->textInput() ?>

    <?= $form->field($model, 'distribucion')->textInput() ?>

    <?= $form->field($model, 'garantia')->textInput() ?>

    <?= $form->field($model, 'condiciones')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'fecha_reg')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textInput() ?>

    <?= $form->field($model, 'autoriza')->textInput() ?>

    <?= $form->field($model, 'entrega')->textInput() ?>

    <?= $form->field($model, 'recibe')->textInput() ?>

    <?= $form->field($model, 'docto')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
