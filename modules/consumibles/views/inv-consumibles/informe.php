<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\ventas\models\InvProductosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inv Productos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Inventario de Productos</h3>
                            </div>

                                <div class="row">
 <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">


  </div>
  </div>
<div class="panel-body">

 <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
  <caption>Reumen de Entrega</caption>
  <thead>
    <tr>
      <th>Consumible</th>
      <th>Entrada</th>
     <tH>Iztapalapa 1</th>
     <tH>A. Obregon</th>
     <th>Azcapotzalco</th>
     <th>Coyoacan</th>
     <th>Cuajimalpa</th>
     <th>Gam1</th>
     <th>Gam2</th>
     <th>Iztacalco</th>
     <th>Iztapalapa2</th>
     <th>M. Contreras</th>
     <<th>M. Hidalgo</th>
     <TH>Milpa Alta</TH>
     <th>Tlahuac</th>
     <th>Tlalpan1</th>
     <th>Tlalpan2</th>
     <th>VCarranza</th>
     <th>Xochimilco</th>
     <th>Iztapalapa3</th>
     <th>A. Obregon2</th>
     <th>Iztapalapa4</th>
     <th>Salidas</th>
     <th>Existencia</th>
    </tr>
  </thead>
  <tbody>

  <?

foreach ($model as $value) {

   $sql = "SELECT 
  sum(cantidad) as cant 
FROM 
  cons_entradas
WHERE
   estado=1 and id_consumible=".$value->id_consumible."";



$entradas = \Yii::$app->db->createCommand($sql)->queryOne();


$sql = "SELECT 
  sum(cantidad) as cant 
FROM 
  cons_detalle
WHERE
  estado=1 and id_cons=".$value->id_consumible."";



$salidas = \Yii::$app->db->createCommand($sql)->queryOne();



$sql1 = "SELECT 
  sum(cons_detalle.cantidad) as cant 
FROM 
  cons_salidas, cons_detalle
WHERE
  cons_salidas.id = cons_detalle.id_salida and cons_salidas.id_plantel_destino=1 and cons_detalle.id_cons=".$value->id_consumible."";



$iztapalapa1 = \Yii::$app->db->createCommand($sql1)->queryOne();


$sql2 = "SELECT 
  sum(cons_detalle.cantidad) as cant 
FROM 
  cons_salidas, cons_detalle
WHERE
  cons_salidas.id = cons_detalle.id_salida and cons_salidas.id_plantel_destino=2 and cons_detalle.id_cons=".$value->id_consumible."";



$ao = \Yii::$app->db->createCommand($sql2)->queryOne();


$sql3 = "SELECT 
  sum(cons_detalle.cantidad) as cant 
FROM 
  cons_salidas, cons_detalle
WHERE
  cons_salidas.id = cons_detalle.id_salida and cons_salidas.id_plantel_destino=3 and cons_detalle.id_cons=".$value->id_consumible."";



$azc = \Yii::$app->db->createCommand($sql3)->queryOne();


$sql4 = "SELECT 
  sum(cons_detalle.cantidad) as cant 
FROM 
  cons_salidas, cons_detalle
WHERE
  cons_salidas.id = cons_detalle.id_salida and cons_salidas.id_plantel_destino=4 and cons_detalle.id_cons=".$value->id_consumible."";



$coy = \Yii::$app->db->createCommand($sql4)->queryOne();

$sql5 = "SELECT 
  sum(cons_detalle.cantidad) as cant 
FROM 
  cons_salidas, cons_detalle
WHERE
  cons_salidas.id = cons_detalle.id_salida and cons_salidas.id_plantel_destino=5 and cons_detalle.id_cons=".$value->id_consumible."";



$cua = \Yii::$app->db->createCommand($sql5)->queryOne();


$sql6 = "SELECT 
  sum(cons_detalle.cantidad) as cant 
FROM 
  cons_salidas, cons_detalle
WHERE
  cons_salidas.id = cons_detalle.id_salida and cons_salidas.id_plantel_destino=6 and cons_detalle.id_cons=".$value->id_consumible."";



$gam1 = \Yii::$app->db->createCommand($sql6)->queryOne();

$sql7 = "SELECT 
  sum(cons_detalle.cantidad) as cant 
FROM 
  cons_salidas, cons_detalle
WHERE
  cons_salidas.id = cons_detalle.id_salida and cons_salidas.id_plantel_destino=7 and cons_detalle.id_cons=".$value->id_consumible."";



$gam2 = \Yii::$app->db->createCommand($sql7)->queryOne();

$sql8 = "SELECT 
  sum(cons_detalle.cantidad) as cant 
FROM 
  cons_salidas, cons_detalle
WHERE
  cons_salidas.id = cons_detalle.id_salida and cons_salidas.id_plantel_destino=8 and cons_detalle.id_cons=".$value->id_consumible."";



$izta = \Yii::$app->db->createCommand($sql8)->queryOne();

$sql9 = "SELECT 
  sum(cons_detalle.cantidad) as cant 
FROM 
  cons_salidas, cons_detalle
WHERE
  cons_salidas.id = cons_detalle.id_salida and cons_salidas.id_plantel_destino=9 and cons_detalle.id_cons=".$value->id_consumible."";



$izta2 = \Yii::$app->db->createCommand($sql9)->queryOne();


$sql10 = "SELECT 
  sum(cons_detalle.cantidad) as cant 
FROM 
  cons_salidas, cons_detalle
WHERE
  cons_salidas.id = cons_detalle.id_salida and cons_salidas.id_plantel_destino=10 and cons_detalle.id_cons=".$value->id_consumible."";



$mcon = \Yii::$app->db->createCommand($sql10)->queryOne();


$sql11 = "SELECT 
  sum(cons_detalle.cantidad) as cant 
FROM 
  cons_salidas, cons_detalle
WHERE
  cons_salidas.id = cons_detalle.id_salida and cons_salidas.id_plantel_destino=11 and cons_detalle.id_cons=".$value->id_consumible."";



$mhidalgo = \Yii::$app->db->createCommand($sql11)->queryOne();


$sql12 = "SELECT 
  sum(cons_detalle.cantidad) as cant 
FROM 
  cons_salidas, cons_detalle
WHERE
  cons_salidas.id = cons_detalle.id_salida and cons_salidas.id_plantel_destino=12 and cons_detalle.id_cons=".$value->id_consumible."";



$milpa = \Yii::$app->db->createCommand($sql12)->queryOne();

$sql13 = "SELECT 
  sum(cons_detalle.cantidad) as cant 
FROM 
  cons_salidas, cons_detalle
WHERE
  cons_salidas.id = cons_detalle.id_salida and cons_salidas.id_plantel_destino=13 and cons_detalle.id_cons=".$value->id_consumible."";



$tla = \Yii::$app->db->createCommand($sql13)->queryOne();

$sql14 = "SELECT 
  sum(cons_detalle.cantidad) as cant 
FROM 
  cons_salidas, cons_detalle
WHERE
  cons_salidas.id = cons_detalle.id_salida and cons_salidas.id_plantel_destino=14 and cons_detalle.id_cons=".$value->id_consumible."";



$tla1 = \Yii::$app->db->createCommand($sql14)->queryOne();

$sql15 = "SELECT 
  sum(cons_detalle.cantidad) as cant 
FROM 
  cons_salidas, cons_detalle
WHERE
  cons_salidas.id = cons_detalle.id_salida and cons_salidas.id_plantel_destino=15 and cons_detalle.id_cons=".$value->id_consumible."";



$tla2 = \Yii::$app->db->createCommand($sql15)->queryOne();

$sql16 = "SELECT 
  sum(cons_detalle.cantidad) as cant 
FROM 
  cons_salidas, cons_detalle
WHERE
  cons_salidas.id = cons_detalle.id_salida and cons_salidas.id_plantel_destino=16 and cons_detalle.id_cons=".$value->id_consumible."";



$xochi = \Yii::$app->db->createCommand($sql16)->queryOne();


$sql17 = "SELECT 
  sum(cons_detalle.cantidad) as cant 
FROM 
  cons_salidas, cons_detalle
WHERE
  cons_salidas.id = cons_detalle.id_salida and cons_salidas.id_plantel_destino=17 and cons_detalle.id_cons=".$value->id_consumible."";



$vcar = \Yii::$app->db->createCommand($sql17)->queryOne();

$sql18 = "SELECT 
  sum(cons_detalle.cantidad) as cant 
FROM 
  cons_salidas, cons_detalle
WHERE
  cons_salidas.id = cons_detalle.id_salida and cons_salidas.id_plantel_destino=18 and cons_detalle.id_cons=".$value->id_consumible."";



$izta3 = \Yii::$app->db->createCommand($sql18)->queryOne();

$sql19 = "SELECT 
  sum(cons_detalle.cantidad) as cant 
FROM 
  cons_salidas, cons_detalle
WHERE
  cons_salidas.id = cons_detalle.id_salida and cons_salidas.id_plantel_destino=19 and cons_detalle.id_cons=".$value->id_consumible."";



$obregon2 = \Yii::$app->db->createCommand($sql19)->queryOne();

$sql20 = "SELECT 
  sum(cons_detalle.cantidad) as cant 
FROM 
  cons_salidas, cons_detalle
WHERE
  cons_salidas.id = cons_detalle.id_salida and cons_salidas.id_plantel_destino=20 and cons_detalle.id_cons=".$value->id_consumible."";



$izta4 = \Yii::$app->db->createCommand($sql20)->queryOne();

$existencia = $entradas['cant'] - $salidas['cant'];

  ?>
<tr>
      <td><?=$value->datos->nombre?></td>
      <td><?=$entradas['cant']?></td>
      <td><?=$iztapalapa1['cant']?></td>
      <td><?=$ao['cant']?></td>
      <td><?=$azc['cant']?></td>
      <td><?=$coy['cant']?></td>
      <td><?=$cua['cant']?></td>
      <td><?=$gam1['cant']?></td>
      <td><?=$gam2['cant']?></td>
      <td><?=$izta['cant']?></td>
      <td><?=$izta2['cant']?></td>
      <td><?=$mcon['cant']?></td>
      <td><?=$mhidalgo['cant']?></td>
      <td><?=$milpa['cant']?></td>
      <td><?=$tla['cant']?></td>
      <td><?=$tla1['cant']?></td>
      <td><?=$tla2['cant']?></td>
      <td><?=$xochi['cant']?></td>
      <td><?=$vcar['cant']?></td>
      <td><?=$izta3['cant']?></td>
      <td><?=$obregon2['cant']?></td>
      <td><?=$izta4['cant']?></td>
                     
      <td><?=$salidas['cant']?></td>
      <td><?=$existencia?></td>


    </tr>
  <?php
  # code...
}

?>
    
  </tbody>
</table>
</<div>
</div>  
</div>

  </div>
</div>
