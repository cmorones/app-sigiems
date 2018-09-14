<br>
<br>
<br>
<br>



  
  <?php

use yii\helpers\Html;

$plantel = Yii::$app->user->identity->id_plantel;

if ($plantel == 23 ) {
  $pl = 100;
}else {
  $pl = $plantel;
}

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


$i1=1;
foreach ($inventario as $key => $value) {
$i1++;
}

  $sumequipos = app\modules\soporte\models\InvEquipos::find()->where(['id_plantel'=>$plantel])->andWhere(['id_tipo'=>1])->count();

   $sumbaj = app\modules\soporte\models\InvBajas::find()->where(['bloq'=>1])->andWhere(['id_plantel'=>$plantel])->andWhere(['id_tipo'=>1])->count();
  
$diferencia =  $i1 - ($sumequipos + $sumbaj);

$totaldit = $sumequipos + $sumbaj;

 ?>
<br>
<br>
<br>


<div class="col-xs-3" style="padding-top: 10px;">
<h1>Totales</h1>
 <div class="box">
   <div class="box-body table-responsive">
          <table class="table table-striped table-bordered">


    <tr>
        <th>Total de Equipos registrados en almacen</th> <td><?=$i1?></td>
      
       
    </tr>

    <tr>
        <th>Total de Equipos registrados en inventario DIT</th> <td><?=$sumequipos?></td>
      
       
    </tr>

       <tr>
        <th>Total de Equipos en proceso de bajas DIT</th> <td><?=$sumbaj?></td>
      
       
    </tr>

     <tr>
        <th>Total de Equipos DIT</th> <td style="color:red;"><b><?=$totaldit?></b></td>
      
       
    </tr>

     <tr>
        <th style="color:red;">Diferencia Almacen - DIT </th> <td style="color:red;"><b><?=$diferencia?></b></td>
      
       
    </tr>

    </table>
    </div>
    </div>
</div>
<div class="col-xs-12" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
     <h1>Relación de equipos Activos en Plantel</h1>
          <table class="table table-striped table-bordered">

<tr>
  <th colspan="7" >Consulta  equipos Sistema de almacen</th>
  <th colspan="8" >Consulta equipos Sistema de DIT</th>
</tr>
    <tr>
        <th>Num</th>
      
        <th>Progresivo</th>
       
        <th>Marca</th>
        <th>Modelo</th>
        <th>Serie</th>
        <th>Empleado</th>
        <th>Plantel</th>
        <th>Inventario DIT</th>
        <th>Bajas DIT</th>
        <th>Info Equipo</th>
        <th>Info Telecom</th>
        <th>Sistema Operativo</th>
        <th>Software</th>
        <th>Info Usuario</th>
        <th>Usuario</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Serie</th>

    </tr>

    <?php 
$i=1;
foreach ($inventario as $key => $value) {

   $rev = app\modules\soporte\models\InvEquipos::find()->where(['progresivo'=>$value['progresivo']])->andWhere(['id_plantel'=>$plantel])->count();
    $revisado = intval($rev);

    $equipo =  app\modules\soporte\models\InvEquipos::find()->where(['progresivo'=>$value['progresivo']])->one();

    $marca = app\modules\soporte\models\CatMarca::find()->where(['id'=>$equipo['marca']])->one();


    $modelo = app\modules\soporte\models\CatModelo::find()->where(['id'=>$equipo['modelo']])->one();

      $revtelecom = app\modules\soporte\models\InvTelecom::find()->where(['id_equipo'=>$equipo['id']])->count();
    $revisadotelecom = intval($revtelecom);

     $revso = app\modules\soporte\models\InvSo::find()->where(['id_equipo'=>$equipo['id']])->count();
    $revisadoso = intval($revso);

     $revsw = app\modules\soporte\models\InvSw::find()->where(['id_equipo'=>$equipo['id']])->count();
    $revisadosw = intval($revsw);

    $baj = app\modules\soporte\models\InvBajas::find()->where(['progresivo'=>$value['progresivo']])->andWhere(['id_plantel'=>$plantel])->andWhere(['id_tipo'=>1])->count();
    $bajas = intval($baj);

     
            if ($revisado>0) {
            
            $inv = '<a title="Mark this example as good" href="#" class="rating-up btn btn-success glyphicon glyphicon-thumbs-up" data-id="rating_2"></a>';
             } else {
            
            $inv ='<a title="Mark this example as bad" href="#" class="rating-down btn btn-danger glyphicon glyphicon-thumbs-down" data-id="rating_2"></a>';
          
              }


            if ($bajas>0) {
            
            $pbajas = '<a title="Mark this example as good" href="#" class="rating-up btn btn-success glyphicon glyphicon-thumbs-up" data-id="rating_2"></a>';
             } else {
            
            $pbajas ='<a title="Mark this example as bad" href="#" class="rating-down btn btn-danger glyphicon glyphicon-thumbs-down" data-id="rating_2"></a>';
          
              }


  ?>
<tr>

  <td><?=$i?></td>
  
    <td><?=$value['progresivo']?></td>
   
    <td><?=$value['marca']?></td>
    <td><?=$value['modelo']?></td>
    <td><?=$value['serie']?></td>
   
    <td><?=$value['nombre_empleado']?> <?=$value['apellidos_empleado']?></td>
    <td><?//=$value['pdescrip']?></td>
    <td><?=$inv?></td>
     <td><?=$pbajas?></td>
     <td>
       <?php
         if ($revisado>0){
                echo  ('<center>'.Html::img('@web/images/checked.png').'</center>');
              }else {
   echo  ('<center>'.Html::img('@web/images/unchecked.png').'</center>');
                  }

                  ?>
     </td>
     <td>
        <?php
         if ($revisadotelecom>0){
                echo  ('<center>'.Html::img('@web/images/checked.png').'</center>');
              }else {
   echo  ('<center>'.Html::img('@web/images/unchecked.png').'</center>');
                  }

                  ?>
     </td>
     <td>  <?php
         if ($revisadoso>0){
                echo  ('<center>'.Html::img('@web/images/checked.png').'</center>');
              }else {
   echo  ('<center>'.Html::img('@web/images/unchecked.png').'</center>');
                  }

                  ?></td>
                  <td><?php
         if ($revisadosw>0){
                echo  ('<center>'.Html::img('@web/images/checked.png').'</center>');
              }else {
   echo  ('<center>'.Html::img('@web/images/unchecked.png').'</center>');
                  }

                  ?></td>
    <td>
   
      <?php
         if ($equipo['usuario']<>''){
                echo  ('<center>'.Html::img('@web/images/checked.png').'</center>');
              }else {
   echo  ('<center>'.Html::img('@web/images/unchecked.png').'</center>');
                  }






      ?>
    </td>
    <td><?=$equipo['usuario']?>
      
      <?php
         if ($revisadosw>0){
                echo  ('<center>'.Html::img('@web/images/checked.png').'</center>');
              }else {
   echo  ('<center>'.Html::img('@web/images/unchecked.png').'</center>');
                  }

                  ?>
    </td>
    <td><?=$marca['nombre']?>
      <?php
         if ($marca['nombre']==$value['marca']){
                echo  ('<center>'.Html::img('@web/images/checked.png').'</center>');
              }else {
   echo  ('<center>'.Html::img('@web/images/unchecked.png').'</center>');
                  }

                  ?>

    </td>
    <td><?=$modelo['modelo']?>
      <?php
         if ($modelo['modelo']==$value['modelo']){
                echo  ('<center>'.Html::img('@web/images/checked.png').'</center>');
              }else {
   echo  ('<center>'.Html::img('@web/images/unchecked.png').'</center>');
                  }

                  ?>
    </td>
    <td><?=$equipo['serie']?>
      <?php
         if ($equipo['serie']==$value['serie']){
                echo  ('<center>'.Html::img('@web/images/checked.png').'</center>');
              }else {
   echo  ('<center>'.Html::img('@web/images/unchecked.png').'</center>');
                  }

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