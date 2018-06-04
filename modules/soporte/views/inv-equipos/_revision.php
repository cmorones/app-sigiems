<?php

use yii\helpers\Html;


$sql = "SELECT 
  bienes_muebles.clave_cabms, 
  bienes_muebles.progresivo, 
  bienes_muebles.marca, 
  bienes_muebles.modelo, 
  bienes_muebles.serie, 
  resguardos.id_bien_mueble, 
  personal.nombre_empleado, 
  personal.apellidos_empleado, 
  personal.rfc,
  bienes_muebles.fecha_alta,
  situacion_bienes.descripcion 
FROM 
  public.bienes_muebles, 
  public.resguardos, 
  public.personal,
  public.situacion_bienes
WHERE
  bienes_muebles.clave_cabms = '5151000138' and 
   bienes_muebles.id_situacion_bien = situacion_bienes.id_situacion_bien and 
   bienes_muebles.id_situacion_bien = 1 and  
  resguardos.id_bien_mueble = bienes_muebles.id_bien_mueble AND
  personal.id_empleado = resguardos.id_personal";
$inventario = \Yii::$app->db2->createCommand($sql)->queryAll();



 ?>
<br>
<br>
<br>
<div class="col-xs-12" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
     <h1>Releacióń de equipos faltantes</h1>
          <table class="table table-striped table-bordered">


    <tr>
        <th>Num</th>
        <th>Clave Cabms</th>
        <th>Progresivo(Inventario)</th>
       
        <th>Marca(Inventario)</th>
        <th>Modelo(Inventario)</th>
        <th>Serie</th>
      
        <th>Resguardante (Inventario)</th>
        <th>Registrado</th>

    </tr>

    <?php 
$i=1;
foreach ($inventario as $key => $value) {

   $rev = app\modules\soporte\models\InvEquipos::find()->where(['progresivo'=>$value['progresivo']])->count();
    $revisado = intval($rev);

  ?>
  <tr>









  <td><?=$i?></td>
    <td><?=$value['clave_cabms']?></td>
    <td><?=$value['progresivo']?></td>
   
    <td><?=$value['marca']?></td>
    <td><?=$value['modelo']?></td>
    <td><?=$value['serie']?></td>
    <td><?=$value['nombre_empleado']?> <?=$value['apellidos_empleado']?></td>

    <td>
    <?=$revisado?> 
      <?php

         if ($revisado>0){
                echo  ('<center>'.Html::img('@web/images/checked.png').'</center>');
              }else {
   echo  ('<center>'.Html::img('@web/images/unchecked.png').'</center>');
                  }






      ?>
    </td>

    
    

































  </tr>
<?php
$i++; 
}

     ?>

    </table>