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

<div class="inv-equipos-form">

<div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"></h3>
  </div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
    <div class="col-xs-4 edusecArLangHide"></div>
    <div class="col-xs-4 edusecArLangHide"></div>
    <div class="col-xs-4 left-padding">
    <?//= Html::a(Yii::t('app', 'Regresar'), ['index', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
</div>


<br>
<br>
<br>


<div class="col-xs-12 col-lg-12">
<div class="events-form">

    <?php $form = ActiveForm::begin([
			'id' => 'events-prestamos-form',
			'fieldConfig' => [
			    'template' => "{label}{input}{error}",
			],
    ]); ?>



        <div class="row">
 <?= $form->field($model, 'file')->fileInput() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>



		

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>