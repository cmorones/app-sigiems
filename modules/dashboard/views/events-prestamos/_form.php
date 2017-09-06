<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use app\modules\admin\models\CatAreas;
use app\modules\admin\models\Users;
use app\modules\admin\models\CatPisos;
use app\modules\soporte\models\EstadoPresta;
use yii\helpers\ArrayHelper;
//use kartik\widgets\DateTimePicker
/* @var $this yii\web\View */
/* @var $model app\models\Events */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
if(isset($_REQUEST['start_date']) && isset($_REQUEST['end_date'])) {
	$model->event_start_date = Yii::$app->dateformatter->getDTFormat($_REQUEST['start_date']);
	$model->event_end_date = Yii::$app->dateformatter->getDTFormat($_REQUEST['start_date']);
}
if(isset($_REQUEST['event_id'])) {
	echo '<div class="visible-xs-4 col-sm-3 col-lg-3 pull-right">';
	if(isset($_GET['return_dashboard'])) {
		echo Html::a('<i class="fa fa-file-pdf-o"></i> PRESTAMO-PDF',['/soporte/inf-pdf/index6', 'idp'=>$model->event_id],['id' => 'export-pdf', 'target' => 'blank', 'class' => 'btn btn-primary btn-warning']);
	} else {
		echo Html::a('<i class="fa fa-file-pdf-o"></i> PRESTAMO-PDF',['/soporte/inf-pdf/index6', 'idp'=>$model->event_id],['id' => 'export-pdf', 'target' => 'blank', 'class' => 'btn btn-primary btn-warning']);
	} 
	echo '</div>';
	
	//$model->event_start_date = Yii::$app->formatter->asDateTime($model->event_start_date);
	//$model->event_end_date = Yii::$app->formatter->asDateTime($model->event_end_date);
}
?>
<div class="col-xs-12 col-lg-12">
<div class="events-form">

    <?php $form = ActiveForm::begin([
			'id' => 'events-prestamos-form',
			'fieldConfig' => [
			    'template' => "{label}{input}{error}",
			],
    ]); ?>





			<div class="form-group">
			<div class="col-lg-4">
                                            <label for="cname" class="control-label col-lg-2">Solicitante:</label>

                                              

                                             <?= $form->field($model, 'responsable', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Responsable'] ] )->textInput(['maxlength' => 255])->label(false); ?>

                                        </div>
                                        </div>

 			<div class="form-group">
 			<div class="col-lg-4">
                                          
                                        
                                             <label for="cname" >Ubicación del Prestamo:</label>
                                            
                                              

                                             <?= $form->field($model, 'id_area', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(CatAreas::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->all(), 'id_area', 'nombre'), ['prompt'=>'Selecciona una Área'])->label(false); ?>
                                            
                                            </div>
                                            </div>
        	<div class="form-group">
        	<div class="col-lg-4">
                                          
                                        
                                             <label for="cname" class="control-label col-lg-2">Piso:</label>
                                           
                                              

                                             <?= $form->field($model, 'id_piso', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(CatPisos::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Piso'])->label(false); ?>
                                         
                                        </div>
                                        </div>

            <div class="form-group">
            <div class="col-lg-4">
                                            <label for="cname" >Folio-SISMA:</label>
                                            
                                              

                                             <?= $form->field($model, 'ticket', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Folio-SISMA'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                        
                                        </div>
                                        </div>

			<div class="form-group">
            <div class="col-lg-4">
    <?= $form->field($model, 'event_start_date')->widget(DateTimePicker::classname(), [
			'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
      'attribute' => 'event_start_date',
			'options' => ['placeholder' => '', 'readOnly' => true],
			'pluginOptions' => [
				'autoclose' => true,
        'language' => 'es',
				//'maxView' => 0,
				//'startView' => 0,
				'format' => 'dd-mm-yyyy hh:ii:ss',
			], 
		]);
    ?>
    </div>
    </div>

   <div class="form-group">
            <div class="col-lg-4">
    <?= $form->field($model, 'event_end_date')->widget(DateTimePicker::classname(), [
			'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
      'attribute' => 'event_end_date',
			'options' => ['placeholder' => '', 'readOnly' => true],
			'pluginOptions' => [
				'autoclose' => true,
				'format' => 'dd-mm-yyyy hh:ii:ss',
			], 
		]);
    ?>
    </div>	
    </div>




    <div class="form-group">
            <div class="col-lg-4">
                                            
                                            
                                              

                                             <?= $form->field($model, 'event_type')->dropDownList([1 => 'Pendiente', 2 => 'En Proceso', 3 => 'Terminado', 4 => 'Fuera de Tiempo'],['prompt'=> Yii::t('app', '--- Selecciona un Status ---')]); ?>
                                        
                                        </div>
                                        </div>

    <div class="form-group">
            <div class="col-lg-4">
            <label for="cname" >Tecnico que Elabora:</label>
<td>
<?= $form->field($model, 'tecnico', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(Users::find()->where(['perfil' => 3])->all(), 'user_id', 'nombre'), ['prompt'=>''])->label(false); ?>
</td>
</div>
                                        </div>




                                        <table class="table table-bordered table-striped border bgcolor=#ffffff">
<thead>
    <tr>
      <th>Tipo:</th>
      <th>Estado:</th>
      <th>Progresivo:</th>
    </tr>
    </thead>
    <tbody>
      <tr>
      <td>
      
      
                                              

                                             <? echo $form->field($model, 'laptop')->label(false)
          ->checkbox(['uncheck' => "0", 'checked' => "1"]); 
          ?>
          </td>
          <td>
          

                                              

                                             <?= $form->field($model, 'estado_lap', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(EstadoPresta::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Estado', 'style'=>"width: 181px"])->label(false); ?>
                                            
                                            </td>
                                            <td>
                                            	<?= $form->field($model, 'progresivo_laptop', ['inputOptions'=>[ 'class'=>'form-control'] ] )->textInput(['maxlength' => 35, 'style'=>"width: 100px"])->label(false); ?>
                                            </td>
                                            </tr>
                                            <tr> <td>
<? echo $form->field($model, 'video_proye')->label(false)
          ->checkBox(['uncheck' => "0", 'checked' => "1"]); 
          ?>
</td>
<td>
<?= $form->field($model, 'estado_proye', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(EstadoPresta::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Estado', 'style'=>"width: 181px"])->label(false); ?>
</td>
                                        <td>
 <?= $form->field($model, 'progresivo_proyector', ['inputOptions'=>[ 'class'=>'form-control'] ] )->textInput(['maxlength' => 35, 'style'=>"width: 100px"])->label(false); ?>
</td>
</tr>
<tr>
              <td>
<? echo $form->field($model, 'impresora')->label(false)
          ->checkBox(['uncheck' => "0", 'checked' => "1"]); 
          ?>
</td>
              <td>
 <?= $form->field($model, 'estado_imp', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(EstadoPresta::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Estado', 'style'=>"width: 181px"])->label(false); ?>
</td>
<td>
<?= $form->field($model, 'progresivo_impresora', ['inputOptions'=>[ 'class'=>'form-control'] ] )->textInput(['maxlength' => 35, 'style'=>"width: 100px"])->label(false); ?>
</td>
</tr>
<tr><td>
<? echo $form->field($model, 'mouse')->label(false)
          ->checkBox(['uncheck' => "0", 'checked' => "1"]); 
          ?>
</td>
                                            <td>
<?= $form->field($model, 'estado_mouse', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(EstadoPresta::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Estado', 'style'=>"width: 181px"])->label(false); ?>
</td>
            </tr> 
            <tr>
<td>
<? echo $form->field($model, 'exten')->label(false)
          ->checkBox(['uncheck' => "0", 'checked' => "1"]); 
          ?>
</td>
            <td>
<?= $form->field($model, 'estado_ext', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(EstadoPresta::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Estado', 'style'=>"width: 181px"])->label(false); ?>
</td>
            </tr>
            <tr>
              <td>
<? echo $form->field($model, 'otro')->label(false)
          ->checkBox(['uncheck' => "0", 'checked' => "1"]); 
          ?>
</td> 
<td colspan="2">
<?= $form->field($model, 'especificar', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Especificar'] ] )->textInput(['maxlength' => 35])->label(false); ?>
</td>         
            </tr>  
            <tr>
              <td></td>
              <td>
<?= $form->field($model, 'estado', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(EstadoPresta::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Estado', 'style'=>"width: 181px"])->label(false); ?>
</td>
            </tr>
                                                      
              </tbody>
              </table> 


    <div class="form-group col-xs-12 col-sm-6 col-lg-5 no-padding edusecArLangCss">
	<div class="col-xs-6">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Agregar') : Yii::t('app', 'Modificar'), ['class' => $model->isNewRecord  ? 'btn btn-success btn-block' : 'btn btn-info btn-block']) ?> 
	</div>
	<div class="col-xs-6">
	<?php if(isset($_GET['return_dashboard'])) 
		echo Html::a(Yii::t('app', 'Cancel'), ['/dashboard'], ['class' => 'btn btn-default btn-block']);
	      else
		echo Html::a(Yii::t('app', 'Cancel'), ['index'], ['class' => 'btn btn-default btn-block']);
	?>
	</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
