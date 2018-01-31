<br>
<br>
<br>
<br>



  
  <?php

use yii\helpers\Html;


$sql = "select 
 bm.id_bien_mueble,
 bm.clave_cabms,
 bm.progresivo,
 bm.id_situacion_bien,
 bm.no_partida_presupuestal,
 bm.fecha_factura,
 bm.costo_alta,
 bm.marca,
 bm.modelo,
 bm.serie,
 bm.fecha_baja,
 bm.id_unidad_procedencia,
 bm.id_causa,
 bm.no_factura,
 bm.id_proveedor,
 bm.id_causa_baja,
 bm.acta_baja,
 cbs.descripcion AS cbscorta,
 cbsdlle.descripcion AS cbsdllelargo,
 r.id_zona,
 r.id_area,
 r.id_personal,
 r.fecha_asignacion,
 p.apellidos_empleado,
 p.nombre_empleado,
 p.rfc,
 z.id_seccion,
 z.id_edificio,
 z.id_plantel,
 z.id_nivel,
 z.id_ubicacion,
 z.cubiculo,
 a.descripcion AS adescrip,
 pros.razon_social AS prosdescrip,
 ps.descripcion AS pdescrip,
 s.descripcion AS sdescrip,
 e.descripcion AS edescrip,
 u.descripcion AS udescrip,
 n.descripcion AS ndescrip 
 from 
 bienes_muebles bm 
 LEFT JOIN cabms cbs ON bm.clave_cabms=cbs.clave_cabms 
 LEFT JOIN cabms_detalle cbsdlle ON bm.id_cabms_detalle=cbsdlle.id_cabms_detalle 
 LEFT JOIN resguardos r ON bm.id_bien_mueble=r.id_bien_mueble
 LEFT JOIN proveedores pros ON bm.id_proveedor=pros.id_proveedor 
 LEFT JOIN personal p ON r.id_personal=p.id_empleado 
 LEFT JOIN zonas z ON r.id_zona=z.id_zona 
 LEFT JOIN areas a ON r.id_area=a.id_area 
 LEFT JOIN planteles ps ON z.id_plantel=ps.id_plantel 
 LEFT JOIN secciones s ON z.id_seccion=s.id_seccion 
 LEFT JOIN edificios e ON z.id_edificio=e.id_edificio
 LEFT JOIN ubicaciones u ON z.id_ubicacion=u.id_ubicacion 
 LEFT JOIN niveles n ON z.id_nivel=n.id_nivel  
 where 
 bm.id_situacion_bien IN(1)  and z.id_plantel=2 and bm.clave_cabms='5151000138' order by bm.id_bien_mueble";
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
      
        <th>Estado</th>
        <th>Plantel</th>

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
    <td><?=$value['id_situacion_bien']?></td>
    <td><?=$value['pdescrip']?> <?//=$value['apellidos_empleado']?></td>

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