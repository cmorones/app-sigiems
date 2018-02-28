<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\consumibles\models\Consumibles */
/* @var $form yii\widgets\ActiveForm */

$areas = [ 1=>'Soporte Técnico', 2=>'Telecomunicaciones'];
?>

<div class="consumibles-form">

    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'nombre')->textInput() ?>
   
      <?= $form->field($model, 'id_medida', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'tipo'] ] )->dropDownList(ArrayHelper::map(app\modules\consumibles\models\CatMedidas::find()->orderBy(['id'=>SORT_ASC])->all(),'id','nombre'),['prompt'=>Yii::t('app', '--- Selecciona medida ---')])->label(false); ?>


  

    <?= $form->field($model, 'detalle')->textInput() ?>

    <?= $form->field($model, 'imagen')->textInput() ?>

    <?= $form->field($model, 'precio')->textInput() ?>

    <?= $form->field($model, 'existencia_min')->textInput() ?>

    <?= $form->field($model, 'existencia_max')->textInput() ?>

    <?= $form->field($model, 'id_area', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'tipo'] ] )->dropDownList($areas,['prompt'=>Yii::t('app', '--- Selecciona medida ---')]); ?>

  
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
