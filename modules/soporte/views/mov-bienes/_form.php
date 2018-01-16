<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
//use kartik\checkbox\CheckboxX;
//se kartik\widgets\ActiveForm;
//use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\MovBienes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-xs-12 col-lg-12">
<div class="events-form">



    <?php $form = ActiveForm::begin([
            'id' => 'mov-bienes-form',
            'fieldConfig' => [
                'template' => "{label}{input}{error}",
            ],
    ]); ?>


                                           

                              

      <?= $form->field($model, 'fecha')->widget(DateTimePicker::classname(), [
            'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
      'attribute' => 'event_start_date',
            'options' => ['placeholder' => '', 'readOnly' => true],
            'pluginOptions' => [
                'autoclose' => true,
        'language' => 'es',
                //'maxView' => 0,
                //'startView' => 0,
                'format' => 'dd-mm-yyyy',
            ], 
        ]);
    ?>

                                      
  

    <?= $form->field($model, 'area_origen')->textInput() ?>

    <?= $form->field($model, 'area_destino')->textInput() ?>


   <?= $form->field($model, "suministro")->checkbox(['value' => "1"]); ?>
   <?= $form->field($model, "prestamo")->checkbox(['value' => "1"]); ?>
   <?= $form->field($model, "salida")->checkbox(['value' => "1"]); ?>
   <?= $form->field($model, "equipo")->checkbox(['value' => "1"]); ?>
   <?= $form->field($model, "refaccion")->checkbox(['value' => "1"]); ?>
   <?= $form->field($model, "material")->checkbox(['value' => "1"]); ?>
   <?= $form->field($model, 'tipo_manto')->textInput() ?>
   <?= $form->field($model, "actualizacion")->checkbox(['value' => "1"]); ?>
   <?= $form->field($model, "distribucion")->checkbox(['value' => "1"]); ?>
   <?= $form->field($model, "garantia")->checkbox(['value' => "1"]); ?>
   <?= $form->field($model, 'garantia')->textInput() ?>
   <?= $form->field($model, 'condiciones')->textInput() ?>
   <?= $form->field($model, 'observaciones')->textInput() ?>

    <?= $form->field($model, 'autoriza')->textInput() ?>

    <?= $form->field($model, 'entrega')->textInput() ?>

    <?= $form->field($model, 'recibe')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
