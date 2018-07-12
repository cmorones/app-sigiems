<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\MovDetalle */
/* @var $form yii\widgets\ActiveForm */
?>
  <div class="col-xs-4 left-padding">
    <?= Html::a(Yii::t('app', 'Regresar'), ['inv-asignaciones/index', 'idp'=>$id], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
<div class="mov-detalle-form">

<div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"></h3>
  </div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
    <div class="col-xs-4 edusecArLangHide"></div>
    <div class="col-xs-4 edusecArLangHide"></div>
   
  </div>
</div>

    <?php $form = ActiveForm::begin(); ?>


     <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Agregar/modificar detalle</h3></div>
                            <div class="panel-body">

  <?= $form->field($model, 'descripcion')->textInput() ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>



            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col -->


  

</div>

  

</div>

</div>
