<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use app\modules\admin\models\CatAreas;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvAlterno */
/* @var $form yii\widgets\ActiveForm */
?>

<script type="text/javascript">
  
  jQuery('#fecha').datepicker({"changeMonth":true,"yearRange":"1900:2017","changeYear":true,"autoSize":true,"dateFormat":"dd-mm-yy"});
</script>

<div class="inv-equipos-form">

<div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"></h3>
  </div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
    <div class="col-xs-4 edusecArLangHide"></div>
    <div class="col-xs-4 edusecArLangHide"></div>
    <div class="col-xs-4 left-padding">
    <?= Html::a(Yii::t('app', 'Regresar'), ['inv-equipos/index', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
</div>


    <?php $form = ActiveForm::begin(); ?>

     <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Agregar/modificar sede alterna</h3></div>
                            <div class="panel-body">
                                <div class="form">
                                    <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="#" novalidate="novalidate">


    <div class="row">
      <div class="col-sm-2">
          <label for="ccomment" class="control-label col-lg-2">Fecha</label>
                                           
                            
      </div>
      <div class="col-sm-4">
          <?= $form->field($model, 'fecha')->widget(yii\jui\DatePicker::className(), ['dateFormat' => 'php:d-m-Y',])->label(false); ?>
                                           
        </div>
    </div>


     <div class="row">
      <div class="col-sm-2">
          <label for="ccomment" class="control-label col-lg-2">Plantel temporal</label>
                                           
                            
      </div>
      <div class="col-sm-4">
           <?= $form->field($model, 'id_plantel', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'modelo'] ] )->dropDownList(ArrayHelper::map(app\modules\admin\models\CatPlanteles::find()->orderBy(['id'=>SORT_ASC])->all(),'id','nombre'),['prompt'=>Yii::t('app', '--- Selecciona plantel destino ---')])->label(false); ?>                               
        </div>
    </div>


         <div class="row">
      <div class="col-sm-2">
          <label for="ccomment" class="control-label col-lg-1">Motivo</label>
                                           
                            
      </div>
      <div class="col-sm-4">
             <?= $form->field($model, 'id_motivo', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'modelo'] ] )->dropDownList(ArrayHelper::map(app\modules\soporte\models\CatMotivo::find()->orderBy(['id'=>SORT_ASC])->all(),'id','nombre'),['prompt'=>Yii::t('app', '--- Selecciona motivo cambio ---')])->label(false); ?>                             
        </div>
    </div>


        <div class="row">
      <div class="col-sm-2">
          <label for="ccomment" class="control-label col-lg-1">Ubicacion Fisica en plantel</label>
                                           
                            
      </div>
      <div class="col-sm-4">
           <?= $form->field($model, 'ubicacion', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Ubicacion Física'] ] )->textInput(['maxlength' => 100])->label(false); ?>                           
        </div>
    </div>


      <div class="row">
      <div class="col-sm-2">
          <label for="ccomment" class="control-label col-lg-1">Area</label>
                                           
                            
      </div>
      <div class="col-sm-4">
                   <?= $form->field($model, 'id_area', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(CatAreas::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->all(), 'id_area', 'nombre'), ['prompt'=>'Selecciona una Área'])->label(false); ?>                          
        </div>
    </div>


    <div class="row">
      <div class="col-sm-2">
          <label for="ccomment" class="control-label col-lg-1">Responsable del movimiento</label>
                                           
                            
      </div>
      <div class="col-sm-4">
                   <?= $form->field($model, 'usuario', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Usuario responsable'] ] )->textInput(['maxlength' => 100])->label(false); ?>                         
        </div>
    </div>

     <div class="row">
      <div class="col-sm-2">
          <label for="ccomment" class="control-label col-lg-1">Cargo</label>
                                           
                            
      </div>
      <div class="col-sm-4">
                   <?= $form->field($model, 'observaciones2', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'CArgo responsable'] ] )->textInput(['maxlength' => 100])->label(false); ?>                         
        </div>
    </div>


      <div class="row">
      <div class="col-sm-2">
          <label for="ccomment" class="control-label col-lg-1">Observaciones</label>
                                           
                            
      </div>
      <div class="col-sm-4">
                    <?= $form->field($model, 'observaciones', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Observaciones'] ] )->textArea(['class'=>'form-control','rows' => '6'])->label(false); ?>                    
        </div>
    </div>




 

     <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                            </div>
                                        </div>
    <?php ActiveForm::end(); ?>

</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
