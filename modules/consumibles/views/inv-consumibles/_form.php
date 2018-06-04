<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\consumibles\models\InvConsumibles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inv-consumibles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_consumible')->textInput() ?>

    <?= $form->field($model, 'id_ubicacion')->textInput() ?>

    <?= $form->field($model, 'existencia')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
