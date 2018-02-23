  <?php

use yii\helpers\Html;


$sql = "select distinct
 bm.marca 
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
 bm.id_situacion_bien IN(1) and bm.clave_cabms='5151000138'";
$inventario = \Yii::$app->db2->createCommand($sql)->queryAll();



 ?>
<br>
<br>
<br>
<br>
<div class="col-xs-12" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
     <h1>RELACION DE EQUIPOS - PETIC POR FABRICANTE</h1>
          <table class="table table-striped table-bordered">


    <tr>
        <th>Marca</th>
        <th>2007 o anterior</th>
        <th>2008</th>
        <th>2009</th>
        <th>2010</th>
        <th>2011</th>
        <th>2012</th>
        <th>2013</th>
        <th>2014</th>
        <th>2015</th>
        <th>2016</th>
        <th>2017</th>
       

    </tr>

     <?php 
$i=1;

$total2007 =0;
$total2008 =0;
$total2009 =0;
$total2010 =0;
$total2011 =0;
$total2012 =0;
$total2013 =0;
$total2014 =0;
$total2015 =0;
$total2016 =0;
$total2017 =0;
foreach ($inventario as $key => $value) {


  $query2007 = "select 
 count (bm.id_bien_mueble) as equipos2007
 
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
 bm.id_situacion_bien IN(1) and bm.marca='$value[marca]'  and bm.clave_cabms='5151000138' and  (bm.fecha_alta < '2008-01-01')";

$equipos2007 = \Yii::$app->db2->createCommand($query2007)->queryOne();


  $query2008 = "select 
 count (bm.id_bien_mueble) as equipos2008
 
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
 bm.id_situacion_bien IN(1)  and bm.marca='$value[marca]'  and bm.clave_cabms='5151000138' and  (bm.fecha_alta BETWEEN '2008-01-01' and '2008-12-31')";

$equipos2008 = \Yii::$app->db2->createCommand($query2008)->queryOne();

  $query2009 = "select 
 count (bm.id_bien_mueble) as equipos2009
 
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
 bm.id_situacion_bien IN(1)  and bm.marca='$value[marca]'  and bm.clave_cabms='5151000138' and  (bm.fecha_alta BETWEEN '2009-01-01' and '2009-12-31')";

$equipos2009 = \Yii::$app->db2->createCommand($query2009)->queryOne();

  $query2010 = "select 
 count (bm.id_bien_mueble) as equipos2010
 
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
 bm.id_situacion_bien IN(1)  and bm.marca='$value[marca]'  and bm.clave_cabms='5151000138' and  (bm.fecha_alta BETWEEN '2010-01-01' and '2010-12-31')";

$equipos2010 = \Yii::$app->db2->createCommand($query2010)->queryOne();

  $query2011 = "select 
 count (bm.id_bien_mueble) as equipos2011
 
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
 bm.id_situacion_bien IN(1)  and bm.marca='$value[marca]'  and bm.clave_cabms='5151000138' and  (bm.fecha_alta BETWEEN '2011-01-01' and '2011-12-31')";

$equipos2011 = \Yii::$app->db2->createCommand($query2011)->queryOne();


  $query2012 = "select 
 count (bm.id_bien_mueble) as equipos2012
 
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
 bm.id_situacion_bien IN(1)  and bm.marca='$value[marca]'  and bm.clave_cabms='5151000138' and  (bm.fecha_alta BETWEEN '2012-01-01' and '2012-12-31')";

$equipos2012 = \Yii::$app->db2->createCommand($query2012)->queryOne();

  $query2013 = "select 
 count (bm.id_bien_mueble) as equipos2013
 
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
 bm.id_situacion_bien IN(1)  and bm.marca='$value[marca]'  and bm.clave_cabms='5151000138' and  (bm.fecha_alta BETWEEN '2013-01-01' and '2013-12-31')";

$equipos2013 = \Yii::$app->db2->createCommand($query2013)->queryOne();

  $query2014 = "select 
 count (bm.id_bien_mueble) as equipos2014
 
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
 bm.id_situacion_bien IN(1)  and bm.marca='$value[marca]'  and bm.clave_cabms='5151000138' and  (bm.fecha_alta BETWEEN '2014-01-01' and '2014-12-31')";

$equipos2014 = \Yii::$app->db2->createCommand($query2014)->queryOne();

 $query2015 = "select 
 count (bm.id_bien_mueble) as equipos2015
 
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
 bm.id_situacion_bien IN(1)  and bm.marca='$value[marca]'  and bm.clave_cabms='5151000138' and  (bm.fecha_alta BETWEEN '2015-01-01' and '2015-12-31')";

$equipos2015 = \Yii::$app->db2->createCommand($query2015)->queryOne();

$query2016 = "select 
 count (bm.id_bien_mueble) as equipos2016
 
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
 bm.id_situacion_bien IN(1)  and bm.marca='$value[marca]'  and bm.clave_cabms='5151000138' and  (bm.fecha_alta BETWEEN '2016-01-01' and '2016-12-31')";

$equipos2016 = \Yii::$app->db2->createCommand($query2016)->queryOne();


$query2017 = "select 
 count (bm.id_bien_mueble) as equipos2017
 
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
 bm.id_situacion_bien IN(1)  and bm.marca='$value[marca]'  and bm.clave_cabms='5151000138' and  (bm.fecha_alta BETWEEN '2017-01-01' and '2017-12-31')";

$equipos2017 = \Yii::$app->db2->createCommand($query2017)->queryOne();

  ?>

<tr>
	<th><?=$value['marca']?></th>
	<th><?=$equipos2007['equipos2007']?></th>
	<th><?=$equipos2008['equipos2008']?></th>
	<th><?=$equipos2009['equipos2009']?></th>
	<th><?=$equipos2010['equipos2010']?></th>
	<th><?=$equipos2011['equipos2011']?></th>
	<th><?=$equipos2012['equipos2012']?></th>
	<th><?=$equipos2013['equipos2013']?></th>
	<th><?=$equipos2014['equipos2014']?></th>
	<th><?=$equipos2015['equipos2015']?></th>
	<th><?=$equipos2016['equipos2016']?></th>
	<th><?=$equipos2017['equipos2017']?></th>
</tr>

   <?
$i++;


$total2007 = $total2007 + $equipos2007['equipos2007'];
$total2008 = $total2008 + $equipos2008['equipos2008'];
$total2009 = $total2009 + $equipos2009['equipos2009'];
$total2010 = $total2010 + $equipos2010['equipos2010'];
$total2011 = $total2011 + $equipos2011['equipos2011'];
$total2012 = $total2012 + $equipos2012['equipos2012'];
$total2013 = $total2013 + $equipos2013['equipos2013'];
$total2014 = $total2014 + $equipos2014['equipos2014'];
$total2015 = $total2015 + $equipos2015['equipos2015'];
$total2016 = $total2016 + $equipos2016['equipos2016'];
$total2017 = $total2017 + $equipos2017['equipos2017'];

$grantotal = $total2007 + $total2008 + $total2009 + $total2010 + $total2011 + $total2012 + $total2013 + $total2014 + $total2015 + $total2016 + $total2017;

}

?>

<tr>
	<tr>
	<th><b>Total</b></th>
	<th><?=$total2007?></th>
	<th><?=$total2008?></th>
	<th><?=$total2009?></th>
	<th><?=$total2010?></th>
	<th><?=$total2011?></th>
	<th><?=$total2012?></th>
	<th><?=$total2013?></th>
	<th><?=$total2014?></th>
	<th><?=$total2015?></th>
	<th><?=$total2016?></th>
	<th><?=$total2017?></th>
</tr>
</tr>


<tr>
	<tr>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th><b>Total</b></th>
	<th><?=$grantotal?></th>
</tr>
</tr>