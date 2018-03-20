<?php

use yii\helpers\Html;
use app\modules\consumibles\models\Consumibles;
use app\modules\consumibles\models\ConsSalidas;
use app\modules\consumibles\models\ConsDetalle;


 $model = ConsSalidas::findOne($id);

 $date = new DateTime($model->fecha_reg);

$mov = '';

$cat = '';

$mant = '';

$act = '';


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

table {
    font-family: arial, sans-serif;
    font-size: 9px;
    border-color: #ffffff;
    width: 100%;
    border: 2px;

}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 5px;

}

.fondo {
   background-color: #dddddd;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

.backred {
  color:green;
}

</style>

<?php 

if ($model->id_area_origen == 3) {
  # code...
  $area_origen = "Soporte Tecnico";
}elseif ($model->id_area_origen == 4) {
 $area_origen = "Telecomunicaciones";
}
 ?>







                    
                            <div class="panel-body">
                               
                                <div class="row">
                                    <div class="col-md-12">
                                      <table border="0">
                                        <tr>
                                          <td style="font-size: 14px;">     <address><b>Movimiento de Bienes Informaticos y Refacciones</b></address></td>
                                          <td> <p><strong>Fecha: </strong><?=$date->format('d-m-Y');?></p>
                                            <p class="m-t-20"><strong>Folio: </strong> <span style="color:red;font-size: 12px;"><?=$model->sfolio?></span></p></td>
                                        </tr>
                                      </table>

                                     
                                     
                                    </div>
                                </div>
                             

                                <br>
                                 <div class="box view-item col-xs-12 col-lg-12">
            <table style="background-color:white;">
               <tr >
                <td class="fondo"><b>Plantel Origen:</b></td><td><?=$model->catPlanteles->nombre?></td>
               </tr>
               <tr >
                <td class="fondo"><b>Area Origen:</b></td><td><?=$area_origen?></td>
               </tr>
               <tr >
                <td class="fondo"><b>Plantel Destino:</b></td><td><?=$model->catPlanteles2->nombre?></td>
               </tr>

               <tr >
                <td class="fondo"><b>Area destino:</b></td><td><?=$model->catAreas2->nombre?></td>
               </tr>

                <tr >
                <td class="fondo"><b>Condiciones:</b></td><td><?=$model->condiciones?></td>
               </tr>

                <tr >
                <td class="fondo"><b>Observaciones:</b></td><td><?=$model->observaciones?></td>
               </tr>
             </table>
 </div>
 <br>
                              <div class="row">
<?php
 if ($model->suministro == 1) {
  ?>
<div class="box view-item col-xs-3 col-lg-3">
            <table class="">


    <tr >
                  <td class="fondo">Suministro</td><td><span style="text-align: center">X</span></td>
               </tr>
 </table>
  </div> 
               <?
 }
?>

<?php
 if ($model->prestamo == 1) {
  ?>
<div class="box view-item col-xs-3 col-lg-3">
            <table class="">


    <tr >
                  <td class="fondo">Asignacion</td><td><span style="text-align: center">X</span></td>
               </tr>
 </table>
  </div> 
               <?
 }
?>

<?php
 if ($model->salida == 1) {
  ?>
<div class="box view-item col-xs-3 col-lg-3">
            <table class="">


    <tr >
                  <td class="fondo">Salida</td><td><span style="text-align: center">X</span></td>
               </tr>
 </table>
  </div> 
               <?
 }
?>

<?php
 if ($model->equipo == 1) {
  ?>
<div class="box view-item col-xs-3 col-lg-3">
            <table class="">


    <tr >
                  <td class="fondo">Equipo</td><td><span style="text-align: center">X</span></td>
               </tr>
 </table>
  </div> 
               <?
 }
?>

<?php
 if ($model->refaccion == 1) {
  ?>
<div class="box view-item col-xs-3 col-lg-3">
            <table class="">


    <tr >
                  <td class="fondo">Refaccion</td><td><span style="text-align: center">X</span></td>
               </tr>
 </table>
  </div> 
               <?
 }
?>

<?php
 if ($model->material == 1) {
  ?>
<div class="box view-item col-xs-3 col-lg-3">
            <table class="">


    <tr >
                  <td class="fondo">material</td><td><span style="text-align: center">X</span></td>
               </tr>
 </table>
  </div> 
               <?
 }
?>

</div>

<div class="row">
  
<?php
 if ($model->tipo_manto == 1) {
  ?>
<div class="box view-item col-xs-3 col-lg-2">
            <table class="">


    <tr >
                  <td class="fondo">Mantenimeinto preventivo</td><td><span style="text-align: center">X</span></td>
               </tr>
 </table>
  </div> 
               <?
 } 
?>

<?php
 if ($model->tipo_manto == 2) {
  ?>
<div class="box view-item col-xs-3 col-lg-2">
            <table class="">


    <tr >
                  <td class="fondo">Mantenimeinto correctivo</td><td><span style="text-align: center">X</span></td>
               </tr>
 </table>
  </div> 
               <?
 } 
?>


<?php
 if ($model->actualizacion == 1) {
  ?>
<div class="box view-item col-xs-3 col-lg-3">
            <table class="">


    <tr >
                  <td class="fondo">Actualización</td><td><span style="text-align: center">X</span></td>
               </tr>
 </table>
  </div> 
               <?
 }
?>

<?php
 if ($model->distribucion == 1) {
  ?>
<div class="box view-item col-xs-3 col-lg-3">
            <table class="">


    <tr >
                  <td class="fondo">Distribución</td><td><span style="text-align: center">X</span></td>
               </tr>
 </table>
  </div> 
               <?
 }
?>

<?php
 if ($model->garantia == 1) {
  ?>
<div class="box view-item col-xs-3 col-lg-3">
            <table class="">


    <tr >
                  <td class="fondo">Garantia</td><td><span style="text-align: center">X</span></td>
               </tr>
 </table>
  </div> 
               <?
 }
?>
</div>











                            
                               
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                            <table class="table m-t-10 fondo">
                                                <thead>
                                                    <tr>
                                                  <td align="center">Num.</td> 
                                                   <td align="center">Consumible</td>
                                                    <td align="center">Medida</td>
                                                    <td align="left">Cantidad</td>
                                                    
                                                </tr></thead>
                                                <tbody>
                                                    <?php

                                                  /*  $resultado = ConsDetalle::find()->where(['id_salida'=> $model->id])->all();

*/
                                            /*   $model = MovBienes::findOne($id);
                                                   // $resultado = OrdenesDetalle::find()->where(['id_orden'=> $id])->all();
*/
                                                     $resultado =  ConsDetalle::find()
                                                        ->joinWith('datos')
                                                       // ->onCondition(['>', 'existencia', 0])
                                                        ->where(['=', 'id_salida', $id])
                                                        ->all();


                                                    $i=1;
                                                   // $grantotal=0;*/
                                                   // $grantotal=0;
                                                    foreach ($resultado as $value) {

                                                      $sql = "SELECT m.nombre FROM consumibles as c, cat_medidas as m where c.id_medida = m.id  and c.id=$value->id_cons";
           $medida = Consumibles::findBySql($sql)->one();

                                                          
                                                ?>

                                                        <tr>
                                                          <td><?=$i?></td>
                                                          <td><?=$value->datos->nombre?></td>
                                                          <td><?=$medida['nombre']?></td>
                                                        <td align="center"><?=$value->cantidad?></td>
                                                       
                                                      
                                                    </tr>
                                                       <?php
                                              // $grantotal = $grantotal + $value->cantidad;
                                               $i++;
                                              }
                                              ?>

                                                                                                  </tbody>
                                            </table>
                                      
                                    </div>
                                </div>
                                


                               


                            <table class="table m-t-10 fondo">
                           
                        
                                <tr>
                                  <td align="center"><b>Autoriza</b></td>
                                  <td align="center"><b>Entrega</b></td>
                                   <td align="center"><b>Recibe Bienes</b></td>
                                </tr>
                          
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