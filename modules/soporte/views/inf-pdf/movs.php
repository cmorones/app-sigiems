<?php

use yii\helpers\Html;
use app\modules\soporte\models\MovBienes;
use app\modules\soporte\models\MovDetalle;


 $model = MovBienes::findOne($id);

 $date = new DateTime($model->fecha);

$mov = '';

$cat = '';

$mant = '';

$act = '';

 if ($model->suministro == 1) {
  $mov .= 'Suministro, ';
 }

  if ($model->prestamo == 1) {
  $mov .= 'Prestamo, ';
 }


  if ($model->salida == 1) {
  $mov .= 'Salida, ';
 }

 if ($model->equipo == 1) {
  $cat .= 'Equipo, ';
 }

  if ($model->refaccion == 1) {
  $cat .= 'Refaccion, ';
 }


  if ($model->salida == 1) {
  $cat .= 'Material, ';
 }

 if ($model->tipo_manto == 1) {
  $mant .= 'Preventivo, ';
 }

 if ($model->tipo_manto == 2) {
  $mant .= 'Correctivo, ';
 }

  if ($model->actualizacion == 1) {
  $act .= 'actualizacion, ';
 }

 if ($model->distribucion == 1) {
  $act .= 'distribucion, ';
 }

 if ($model->garantia == 1) {
  $act .= 'garantia, ';
 }

/*

actualizacion integer DEFAULT 0,
  distribucion integer DEFAULT 0,
  garantia integer DEFAULT 0,

  */
?>
  <link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/core.css" rel="stylesheet">
<link href="css/icons.css" rel="stylesheet">
<link href="css/components.css" rel="stylesheet">
<link href="css/pages.css" rel="stylesheet">
<link href="css/menu.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<style type="text/css">
  strong, b {
    font-weight: bold;
}

</style>


                    
                            <div class="panel-body">
                               
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="pull-left m-t-60">
                                            <address>
                                              <strong>Movimiento de Bienes Informaticos y Refacciones
</strong><br>
                                            
                                              </address>
                                        </div>
                                        <div class="pull-right m-t-30">
                                            <p><strong>Fecha: </strong><?=$date->format('d-m-Y');?></p>
                                            <p class="m-t-10"><strong>Folio: </strong> <span style="color:red"><?=$model->sfolio?></span></p>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><b>Plantel Origen:</b><?=$model->catPlanteles->nombre?> <br><b>Area Origen:</b><?=$model->catAreas1->nombre?></p>
                                        <p><b>Plantel Destino:</b><?=$model->catPlanteles2->nombre?> <br><b>Area destino:</b><?=$model->catAreas2->nombre?></p>
                                      
                                        <p class="text-left"><b>Tipo movimiento:</b><?=$mov?></p>
                                        <p class="text-left"><b>Categoria Bien:</b><?=$cat?></p>
                                        <p><b>Actividad:</b><br>Mantenimiento <?=$mant?> <br> Distribucion</p>
                                    </div>
                                </div>
                               
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table m-t-30">
                                                <thead>
                                                    <tr>
                                                   
                                                   
                                                    <th align="center">Cantidad</th>
                                                    <th align="left">Descripcion</th>
                                                    
                                                </tr></thead>
                                                <tbody>
                                                    <?php

                                                    $resultado = MovDetalle::find()->where(['id_mov'=> $model->id])->all();


                                             /*   $model = MovBienes::findOne($id);
                                                   // $resultado = OrdenesDetalle::find()->where(['id_orden'=> $id])->all();

                                                     $resultado =  MovDetalle::find()
                                                        ->joinWith('datos')
                                                       // ->onCondition(['>', 'existencia', 0])
                                                        ->where(['=', 'id_orden', $id])
                                                        ->all();


                                                    $i=1;
                                                    $grantotal=0;*/
                                                    $grantotal=0;
                                                    foreach ($resultado as $value) {



                                                          
                                                ?>

                                                        <tr>
                                                        <td align="center"><?=$value->cantidad?></td>
                                                        <td><?=$value->descripcion?></td>
                                                      
                                                    </tr>
                                                       <?php
                                               $grantotal = $grantotal + $value->cantidad;
                                              }
                                              ?>

                                                                                                  </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                 <hr>
                                        <h5 class="text-left">Total Bienes: <?=$grantotal?></h5>
                                <br>
                                <br>
                                <div class="row" style="border-radius: 0px">
                                    <div class="col-md-3 col-md-offset-9">
                                        <p class="text-left"><b>Condiciones:</b><?=$model->condiciones?></p>
                                        <p class="text-left"><b>Observaciones:</b><?=$model->observaciones?></p>
                                       
                                       
                                       
                                    </div>
                                </div>


                               

                            <br>
                            <br>
                            <br>
                            <br>

                            <table>
                           
                              <thead>
                                <tr>
                                  <th align="center">Autoriza</th>
                                  <th align="center">Entrega</th>
                                   <th align="center">Recibe Bienes</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td><br>_________________________________</td>
                                  <td><br>_________________________________</td>
                                  <td><br>_________________________________</td>

                                </tr>

                                 <tr>
                                  <td>&nbsp; &nbsp;&nbsp; &nbsp;<?=$model->autoriza?>&nbsp; &nbsp;&nbsp; &nbsp;</td>
                                  <td>&nbsp; &nbsp;&nbsp; &nbsp;<?=$model->entrega?>&nbsp; &nbsp;&nbsp; &nbsp;</td>
                                  <td>&nbsp; &nbsp;&nbsp; &nbsp;<?=$model->recibe?>&nbsp; &nbsp;&nbsp; &nbsp;</td>

                                </tr>
                              </tbody>
                            </table>
                             
                             
                            </div>


         