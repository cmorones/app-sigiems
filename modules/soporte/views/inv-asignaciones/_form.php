<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\CatAreas;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvAsignaciones */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="inv-asignaciones-form">
<div clas="row">
    <?php $form = ActiveForm::begin(); ?>

          <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Fecha de asignacion:</label>
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
                                          
                                        
                                             <label for="cname" class="control-label col-lg-2">Area:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'id_area', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(CatAreas::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->all(), 'id_area', 'nombre'), ['prompt'=>'Selecciona una Área'])->label(false); ?>
                                            </div>
                                        </div>


   
      <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Progresivo:</label>
                                            <div class="col-lg-4">
                                              
<?= $form->field($model, 'progresivo', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Progresivo'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                        </div>


 
   <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Nuevo Resguardante:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'resguardante', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Nuevo Resguardante'] ] )->textInput(['maxlength' => 100])->label(false); ?>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Observaciones:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'observaciones', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Nuevo Resguardante'] ] )->textInput(['maxlength' => 35])->label(false); ?>
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
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>