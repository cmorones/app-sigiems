<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\CatAreas;

//use kartik\checkbox\CheckboxX;
//se kartik\widgets\ActiveForm;
//use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\MovBienes */
/* @var $form yii\widgets\ActiveForm */
?>
<br>
<br>
<br>
<br>
<div class="inv-equipos-form">

<div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"></h3>
  </div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
    <div class="col-xs-4 edusecArLangHide"></div>
    <div class="col-xs-4 edusecArLangHide"></div>
    <div class="col-xs-4 left-padding">
    <?= Html::a(Yii::t('app', 'Regresar'), ['index', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
</div>



    <?php $form = ActiveForm::begin([
            'id' => 'mov-bienes-form',
            'fieldConfig' => [
                'template' => "{label}{input}{error}",
            ],
    ]); ?>


     <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Agregar/modificar Equipos</h3></div>
                            <div class="panel-body">


                             


                              <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Fecha </label>
                                            <div class="col-lg-4">
                                              

                                              <?= $form->field($model, 'fecha')->widget(DatePicker::classname(), [
                                                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                              'attribute' => 'event_start_date',
                                                    'options' => ['placeholder' => '', 'readOnly' => true],
                                                    'pluginOptions' => [
                                                        'autoclose' => true,
                                                        'todayHighlight' => true,
                                                'language' => 'es',
                                                        //'maxView' => 0,
                                                        //'startView' => 0,
                                                        'format' => 'dd-mm-yyyy',
                                                    ], 
                                                ])->label(false);
                                            ?>

                                            </div>
                                          
                                        </div>

                                        

                                    
                               <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Area Origen </label>
                                            <div class="col-lg-4">
                                              
                                                     <?= $form->field($model, 'area_origen', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(CatAreas::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->all(), 'id_area', 'nombre'), ['prompt'=>'Selecciona una Área'])->label(false); ?>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Area Destino </label>
                                            <div class="col-lg-4">

                                            <?= $form->field($model, 'plantel', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'tipo'] ] )->dropDownList(ArrayHelper::map(app\modules\admin\models\CatPlanteles::find()->orderBy(['id'=>SORT_ASC])->all(),'id','nombre'),
                                                 [
                                                    'prompt'=>Yii::t('app', '--- Selecciona Marca ---'),
                                                   'onchange'=>'
                                                        $.post( "'.Yii::$app->urlManager->createUrl('soporte/mov-bienes/areas?id=').'"+$(this).val(), function( data ) {
                                                          $( "select#movbienes-area_destino" ).html( data );
                                                        });



                                                    '])->label(false); ?>
                                              
                                                   <?= $form->field($model, 'area_destino', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'modelo'] ] )->dropDownList(ArrayHelper::map(app\modules\soporte\models\CatAreas::find()->orderBy(['id_area'=>SORT_ASC])->all(),'id_area','nombre'),['prompt'=>Yii::t('app', '--- Selecciona Area ---')])->label(false); ?>
                                            </div>
                                        </div>

                                 <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Movimiento</label>
                                            <div class="col-lg-4">
                                              
                                                    <?= $form->field($model, "suministro")->checkbox(['value' => "1"]); ?>
                                                    <?= $form->field($model, "prestamo")->checkbox(['value' => "1"]); ?>
                                                   <?= $form->field($model, "salida")->checkbox(['value' => "1"]); ?>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Categoria</label>
                                            <div class="col-lg-4">
                                              
                                                     <?= $form->field($model, "equipo")->checkbox(['value' => "1"]); ?>
                                                     <?= $form->field($model, "refaccion")->checkbox(['value' => "1"]); ?>
                                                     <?= $form->field($model, "material")->checkbox(['value' => "1"]); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Actividad</label>
                                            <div class="col-lg-4">
                                              
                                                     <?= $form->field($model, 'tipo_manto')->textInput() ?>
   <?= $form->field($model, "actualizacion")->checkbox(['value' => "1"]); ?>
   <?= $form->field($model, "distribucion")->checkbox(['value' => "1"]); ?>
   <?= $form->field($model, "garantia")->checkbox(['value' => "1"]); ?>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-2">Condiciones</label>
                                            <div class="col-lg-4">
                                                <?= $form->field($model, 'condiciones', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Condiciones del bien'] ] )->textArea(['class'=>'form-control','rows' => '6'])->label(false); ?>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-2">observaciones</label>
                                            <div class="col-lg-4">
                                                <?= $form->field($model, 'observaciones', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Observaciones'] ] )->textArea(['class'=>'form-control','rows' => '6'])->label(false); ?>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Autoriza</label>
                                            <div class="col-lg-4">
                                              
                                                   <?= $form->field($model, 'autoriza')->textInput()->label(false); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Entrega</label>
                                            <div class="col-lg-4">
                                              
                                                   <?= $form->field($model, 'entrega')->textInput()->label(false); ?>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Recibe</label>
                                            <div class="col-lg-4">
                                              
                                                   <?= $form->field($model, 'recibe')->textInput()->label(false); ?>
                                            </div>
                                        </div>

<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col -->


  

</div>






    

    <?php ActiveForm::end(); ?>

</div>
