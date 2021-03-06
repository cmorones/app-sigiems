<?php

use yii\helpers\Html;
use app\modules\soporte\models\InvAsignaciones;
use app\modules\soporte\models\AsignDetalle;


 $model = InvAsignaciones::findOne($id);

 $date = new DateTime($model->fecha);



if ($model->id_tipo==1) {
  $clabe_cabs = '5151000138';
  $nombre = 'COMPUTADORA PERSONAL';
}

if ($model->id_tipo==2) {
  $clabe_cabs = '5151000096';
  $nombre = 'IMPRESORA LASER';
}

if ($model->id_tipo==3) {
  $clabe_cabs = '5151000192';
  $nombre = 'SERVIDOR';
}

if ($model->id_tipo==5) {
  $clabe_cabs = '5151000152';
  $nombre = 'NO-BREAK';
}




$sql = "SELECT 
  base_bienes.clave_cabms, 
  base_bienes.progresivo, 
  base_bienes.marca, 
  base_bienes.modelo, 
  base_bienes.serie,
  base_bienes.clave_cabms,
  base_bienes.id_bien_mueble, 
  base_bienes.nombre_empleado, 
  base_bienes.apellidos_empleado, 
  base_bienes.rfc,
  base_bienes.fecha_alta,
  base_bienes.descripcion 
FROM 
  public.base_bienes
WHERE
  base_bienes.clave_cabms = '".$clabe_cabs."' and 
  base_bienes.progresivo = $model->progresivo";

  //$sql =  'SELECT count(base_bienes.marca) FROM base_bienes where base_bienes.clave_cabms='.$clabe_cabs.' and base_bienes.progresivo='.$model->progresivo. '';


$cuenta_inv = \Yii::$app->db2->createCommand("SELECT count(base_bienes.marca) FROM base_bienes where base_bienes.clave_cabms='".$clabe_cabs."' and base_bienes.progresivo='".$model->progresivo."'")->queryColumn();
$inventario = \Yii::$app->db2->createCommand($sql)->queryOne();

/*$mov = '';

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
                                              <strong>Asignación de Bienes Informaticos</strong><br>
                                            
                                              </address>
                                        </div>
                                        <div class="pull-right m-t-30">
                                            <p><strong>Fecha: </strong><?=$date->format('d-m-Y');?></p>
                                            <p class="m-t-10"><strong>Folio: </strong> <span style="color:red"><?=$model->folio?></span></p>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><b>Tipo:</b><?=$nombre?></p>
                                        <p><b>Progresivo:</b><?=$model->progresivo?></p>
                                        <b>Marca:</b><?= $inventario['marca'] ?></p>
                                        <b>Modelo:</b><?= $inventario['modelo'] ?></p>
                                        <b>Serie:</b><?= $inventario['serie'] ?></p>
                                        <b>Resguardante actual:</b><?= $inventario['nombre_empleado'] ?> <?= $inventario['apellidos_empleado'] ?></p>
                                      
                                      </div>
                                </div>
<br>
                                <div class="row">
                                  <div class="col-md-6">
                                    <p><b>Datos de la nueva asignación de bien:</b></p>
                                     <b>Resguardante nuevo:</b><?=$model->resguardante?></p>
                                      <b>Plantel/OFCentral:</b><?=$model->catPlanteles->nombre?></p>
                                     <b>Area:</b><?=$model->catAreas->nombre?></p>
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

                                                    $resultado = AsignDetalle::find()->where(['id_mov'=> $model->id])->all();


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
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-9">
                                       
                                        <p class="text-left"><b>Observaciones:</b><?=$model->observaciones?></p>

                                        <? if ($model->sustitucion == 1) {
                                          ?>
                                          <p><b>Equipo en sustitucion:</b>SI</p>
                                          <p class="text-left"><b>Detalle de Sustitución:</b><?=$model->observaciones?></p>

                                         <?php
                                        }

                                        ?>
                                       
                                       
                                       
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


         