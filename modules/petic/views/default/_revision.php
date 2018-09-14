<br>
<br>
<br>
<br>



  
  <?php

use yii\helpers\Html;


$sql = "SELECT 
  base_bienes.clave_cabms, 
  base_bienes.progresivo, 
  base_bienes.marca, 
  base_bienes.modelo, 
  base_bienes.serie, 
  base_bienes.id_bien_mueble, 
  base_bienes.nombre_empleado, 
  base_bienes.apellidos_empleado, 
  base_bienes.rfc,
  base_bienes.fecha_alta,
  base_bienes.id_situacion_bien,
  base_bienes.descripcion 
FROM 
  public.base_bienes 
WHERE
  (base_bienes.clave_cabms = '5151000138' OR base_bienes.clave_cabms = '5151000192')";
$inventario = \Yii::$app->db2->createCommand($sql)->queryAll();



 ?>
<br>
<br>
<br>
<div class="col-xs-12" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
     <h1>Relacióń de equipos activo vs almacen</h1>
          <table class="table table-striped table-bordered">


    <tr>
        <th>Num</th>
        <th>Clave Cabms</th>
        <th>Progresivo(Inventario)</th>
       
        <th>Marca(Inventario)</th>
        <th>Modelo(Inventario)</th>
        <th>Serie</th>
        <th>Descripcion</th>
        <th>Estado</th>
        <th>Plantel</th>
        <th>Fecha Alta</th>
        <th>Empleado</th>

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
    <td><?//=$value['cbsdllelargo']?></td>
    <td><?=$value['id_situacion_bien']?></td>
    <td><?//=$value['pdescrip']?> <?//=$value['apellidos_empleado']?></td>
    <td><?=$value['fecha_alta']?></td>
    <td><?=$value['nombre_empleado']?> <?=$value['apellidos_empleado']?></td>
    <td>
    <?//=$revisado?> 
      <?php
/*
         if ($revisado>0){
                echo  ('<center>'.Html::img('@web/images/checked.png').'</center>');
              }else {
   echo  ('<center>'.Html::img('@web/images/unchecked.png').'</center>');
                  }



*/


      ?>
    </td>
    </tr>
    <?
$i++;
}

?>
   
     </div>
   </div>
  </div>
</div>