
<?php

use app\modules\admin\models\Users;

$model = app\modules\soporte\models\InvEquipos::findOne($id);

$sql ="SELECT 
  cat_planteles.nombre as plantel, 
  cat_motivo.nombre, 
  inv_alterno.ubicacion, 
  inv_alterno.usuario, 
  inv_alterno.observaciones,
  inv_alterno.observaciones2,
  cat_areas.nombre as area
FROM 
  public.inv_alterno, 
  public.cat_planteles, 
  public.cat_motivo,
  public.cat_areas
WHERE 
  inv_alterno.id_plantel = cat_planteles.id AND
  inv_alterno.id_motivo = cat_motivo.id and
  inv_alterno.id_area = cat_areas.id_area and
  inv_alterno.id_equipo=".$model->id."";
  $datos = \Yii::$app->db->createCommand($sql)->queryOne();


$usuario = Users::find()->where(['user_id' => Yii::$app->user->identity->user_id])->one();
?>



<!------------Start Employee Details Block---------------->
<h3 class="title">Formato Movimiento de Equipo Temporal</h3>
<br>
<br>
<br>
<h2>Datos del Equipo</h2>

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12 ">
<table class="table table-striped table-bordered">
<tr>
	<th><div class="col-md-3 col-sm-3 col-xs-3 "><strong><?= $model->getAttributeLabel('progresivo') ?>:</strong></div></th>
	<td><div class="col-md-9 col-sm-9 col-xs-9 edusec-profile-text"><?= $model->progresivo ?></div></td>
</tr>

<tr>
	<th><div class="col-md-3 col-sm-3 col-xs-3 "><strong><?= $model->getAttributeLabel('id_tipo') ?>:</strong></div></th>
	<td><div class="col-md-9 col-sm-9 col-xs-9 edusec-profile-text"><?= $model->tipoEquipo->nombre ?></div></td>
</tr>

<tr>
	<th><div class="col-md-3 col-sm-3 col-xs-3 "><strong><?= $model->getAttributeLabel('marca') ?>:</strong></div></th>
	<td><div class="col-md-9 col-sm-9 col-xs-9 edusec-profile-text"><?= $model->catMarca->nombre ?></div></td>
</tr>

<tr>
	<th><div class="col-md-3 col-sm-3 col-xs-3 "><strong><?= $model->getAttributeLabel('modelo') ?>:</strong></div></th>
	<td><div class="col-md-9 col-sm-9 col-xs-9 edusec-profile-text"><?= $model->catModelo->modelo ?></div></td>
</tr>

<tr>
	<th><div class="col-md-3 col-sm-3 col-xs-3 "><strong><?= $model->getAttributeLabel('serie') ?>:</strong></div></th>
	<td><div class="col-md-9 col-sm-9 col-xs-9 edusec-profile-text"><?= $model->serie ?></div></td>
</tr>

<tr>
	<th><div class="col-md-3 col-sm-3 col-xs-3 "><strong><?= $model->getAttributeLabel('estado') ?>:</strong></div></th>
	<td><div class="col-md-9 col-sm-9 col-xs-9 edusec-profile-text"><?= $model->estadoEquipo->nombre ?></div></td>
</tr>


<tr>
	<th><div class="col-md-3 col-sm-3 col-xs-3 edusec-profile-label edusecArLangCss"><strong>Motivo:</strong></div></th>
	<td><div class="col-md-9 col-sm-9 col-xs-9 edusec-profile-text"><?= $datos["nombre"]?></div></td>
</tr>

<tr>
	<th><div class="col-md-3 col-sm-3 col-xs-3 edusec-profile-label edusecArLangCss"><strong>Plantel Destino:</strong></div></th>
	<td><div class="col-md-9 col-sm-9 col-xs-9 edusec-profile-text"><?= $datos["plantel"]?></div></td>
</tr>

<tr>
	<th><div class="col-md-3 col-sm-3 col-xs-3 edusec-profile-label edusecArLangCss"><strong>Ubicacion temporal:</strong></div></th>
	<td><div class="col-md-9 col-sm-9 col-xs-9 edusec-profile-text"><?= $datos["ubicacion"]?></div></td>
</tr>

<tr>
	<th><div class="col-md-3 col-sm-3 col-xs-3 edusec-profile-label edusecArLangCss"><strong>Usuario responsable:</strong></div></th>
	<td><div class="col-md-9 col-sm-9 col-xs-9 edusec-profile-text"><?= $datos["usuario"]?></div></td>
</tr>

<tr>
	<th><div class="col-md-3 col-sm-3 col-xs-3 edusec-profile-label edusecArLangCss"><strong>Area:</strong></div></th>
	<td><div class="col-md-9 col-sm-9 col-xs-9 edusec-profile-text"><?= $datos["area"]?></div></td>
</tr>

<tr>
	<th><div class="col-md-3 col-sm-3 col-xs-3 edusec-profile-label edusecArLangCss"><strong>Cargo:</strong></div></th>
	<td><div class="col-md-9 col-sm-9 col-xs-9 edusec-profile-text"><?= $datos["observaciones2"]?></div></td>
</tr>

<tr>
	<th><div class="col-md-3 col-sm-3 col-xs-3 edusec-profile-label edusecArLangCss"><strong>Observaciones:</strong></div></th>
	<td><div class="col-md-9 col-sm-9 col-xs-9 edusec-profile-text"><?= $datos["observaciones"]?></div></td>
</tr>
</table>
</div>
	

	
	</div>




<br>
<br>
<br>
<br>
<br>

   
     
       <div align="center">
        <table class=".centra" >
        <tr>
        <td>                       __________________________________________                         </td>
        <td>                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    </td>
         <td>                       __________________________________________                         </td>
        </tr>

        <tr align="center">
        <td align="center">                      <?=$usuario->nombre?>                        </td>
        <td></td>
        <td align="center">                      <?=$datos["usuario"]?>                        </td>
        </tr>

        <tr align="center">
        <td align="center">                      Jefe de Soporte Técnico                         </td>
        <td></td>
        <td align="center">                      Usuario responsable                         </td>
        </tr>

        <tr>
       
        </tr>

       

        </table>
        </div>
   