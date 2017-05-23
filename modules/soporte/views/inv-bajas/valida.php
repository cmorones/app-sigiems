<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\soporte\models\InvBajas;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\soporte\models\InvBajasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventario de Bajas';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="col-xs-10" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
     <h1>Validacion de Bajas VS Almacen</h1>
          <table class="table table-striped table-bordered">
    <tr>
        <th>Progresivo</th>
        <th>Tipo</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Serie</th>

    </tr>

<?php 

//$plantel = Yii::$app->user->identity->id_plantel;
//$resultado = \Yii::$app->db->createCommand('SELECT * FROM inv_bajas where estado_baja=1 and id_plantel='.$plantel)->queryAll();

$resultado = InvBajas::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->all();


foreach ($resultado as $value) {

if ($value->tipo_baja==2) {
  $clabe_cabs = '5151000138';
}


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
  bienes_muebles.clave_cabms = '".$clabe_cabs."' and 
  bienes_muebles.progresivo = $value->progresivo and
  bienes_muebles.id_situacion_bien = situacion_bienes.id_situacion_bien and  
  resguardos.id_bien_mueble = bienes_muebles.id_bien_mueble AND
  personal.id_empleado = resguardos.id_personal";



$inventario = \Yii::$app->db2->createCommand($sql)->queryOne();

if ($inventario['progresivo']==$value->progresivo) {
  $img = Html::img('@web/images/checked.png');
}else {
  $img = Html::img('@web/images/unchecked.png');
}


if ($inventario['marca']==$value->catMarca->nombre) {
  $img2 = Html::img('@web/images/checked.png');
}else {
  $img2 = Html::img('@web/images/unchecked.png');
}

if ($inventario['modelo']==$value->catModelo->modelo) {
  $img3 = Html::img('@web/images/checked.png');
}else {
  $img3 = Html::img('@web/images/unchecked.png');
}

if ($inventario['serie']==$value->serie) {
  $img3 = Html::img('@web/images/checked.png');
}else {
  $img3 = Html::img('@web/images/unchecked.png');
}







?>

<tr>
    <td><?=$value->progresivo?>(<?=$inventario['progresivo']?>)<?=$img?></td>
    <td><?=$value->tipoBaja->nombre?></td>
    <td><?=$value->catMarca->nombre?>(<?=$inventario['marca']?>)<?=$img2?></td>
    <td><?=$value->catModelo->modelo?>(<?=$inventario['modelo']?>)<?=$img3?></td>
    <td><?=$value->serie?>(<?=$inventario['modelo']?>)<?=$img3?></td>
                
</tr>
    <?php
    # code...
}

?>





</table>
   
     </div>
   </div>
  </div>
</div>


