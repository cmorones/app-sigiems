<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
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
		echo Html::a('<i class="fa fa-trash-o"></i> '.Yii::t('app', 'Remove'), ['events/event-delete', 'e_id' => $_REQUEST['event_id'], 'return_dashboard'=>1], ['class' => 'btn btn-danger btn-block', 'title' => Yii::t('app', 'Remove/Delete Event'), 'data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'), 'method' => 'post'],]);
	} else {
		echo Html::a('<i class="fa fa-trash-o"></i> '.Yii::t('app', 'Remove'), ['events/event-delete', 'e_id' => $_REQUEST['event_id']], ['class' => 'btn btn-danger btn-block', 'title' => Yii::t('app', 'Remove/Delete Event'), 'data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'), 'method' => 'post'],]);
	} 
	echo '</div>';
	
//	$model->event_start_date = Yii::$app->formatter->asDateTime($model->event_start_date);
//$model->event_end_date = Yii::$app->formatter->asDateTime($model->event_end_date);
}
?>
<div class="col-xs-12 col-lg-12">
<div class="events-form">

    <?php $form = ActiveForm::begin([
			'id' => 'events-form',
			'fieldConfig' => [
			    'template' => "{label}{input}",
			],
    ]); ?>

    <div class="col-xs-12 col-sm-12 col-lg-12">    
    <?= $form->field($model, 'event_title')->textInput(['maxlength' => 80]) ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-lg-12">
    <?= $form->field($model, 'event_detail')->textArea(['maxlength' => 255]) ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-lg-12">
    <?= $form->field($model, 'event_start_date')->widget(DateTimePicker::classname(), [
			'type' => DateTimePicker::TYPE_INPUT,
			'options' => ['placeholder' => '', 'readOnly' => true],
			'pluginOptions' => [
				'autoclose' => true,
				'maxView' => 0,
				'startView' => 0,
				'format' => 'yyyy-mm-dd hh:ii:ss',
			], 
		]);
    ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-lg-12">
    <?= $form->field($model, 'event_end_date')->widget(DateTimePicker::classname(), [
			'type' => DateTimePicker::TYPE_INPUT,
			'options' => ['placeholder' => '', 'readOnly' => true],
			'pluginOptions' => [
				'autoclose' => true,
				'format' => 'yyyy-mm-dd hh:ii:ss',
			], 
		]);
    ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-lg-12">
    <?= $form->field($model, 'event_type')->dropDownList([1 => 'Urgente', 2 => 'Importante', 3 => 'Media', 4 => 'Baja'],['prompt'=> Yii::t('app', '--- Select Type ---')]); ?>
    </div>

    <div class="form-group col-xs-12 col-sm-6 col-lg-5 no-padding">
	<div class="col-xs-6">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Agregar') : Yii::t('app', 'Modificar'), ['class' => 'btn btn-success']) ?> 
	</div>
	
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
