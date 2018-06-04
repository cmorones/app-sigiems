<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\modules\consumibles\models\Consumibles;

 $id_area =Yii::$app->user->identity->perfil;

$data = ArrayHelper::map(Consumibles::find()->where(['id_area'=>$id_area])->all(),'id', 'nombre');


/* @var $this yii\web\View */
/* @var $model app\modules\consumibles\models\ConsEntradas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cons-entradas-form">

    <?php $form = ActiveForm::begin(); ?>

  

     <?php
    echo $form->field($model, 'id_consumible')->widget(Select2::classname(), [
    'data' => $data,
    'language' => 'es',
    'options' => ['placeholder' => 'Selecciona Consumible ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);

?>



    <?= $form->field($model, 'fecha')->widget(
    DatePicker::className(), [
        // inline too, not bad
        // 'inline' => true, 
         // modify template for custom rendering
    //   'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'language' => 'es',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-M-dd'
        ]
]);?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textInput() ?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
