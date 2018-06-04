<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvContadores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inv-contadores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_plantel')->textInput() ?>

    <?= $form->field($model, 'id_impresora')->textInput() ?>

    <?= $form->field($model, 'id_periodo')->textInput() ?>

    <?= $form->field($model, 'id_mes')->textInput() ?>

    <?= $form->field($model, 'contador_inicial')->textInput() ?>

    <?= $form->field($model, 'contador_final')->textInput() ?>

    <?= $form->field($model, 'porcentaje')->textInput() ?>

    <?= $form->field($model, 'status_cambio')->textInput() ?>

    <?= $form->field($model, 'documento')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
