
<?php
use yii\helpers\Html; 
use app\modules\soporte\models\InvAlterno;
$adminUser = array_keys(\Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()));
?>

<div class="row">
  <div class="col-xs-12">
	<h2 class="page-header">	
	<i class="fa fa-info-circle"></i> Información del equipo en sede alterna <?=$model->id;?>
	<div class="<?= (Yii::$app->language == 'ar') ? 'pull-left' : 'pull-right'?>">
	<?php // if((Yii::$app->user->can("/student/stu-master/update") && ($_REQUEST['id'] == Yii::$app->session->get('stu_id'))) || (in_array("SuperAdmin", $adminUser)) || Yii::$app->user->can("updateAllStuInfo")) { 
//print_r($adminUser);


$idalterno = InvAlterno::find()->where(['id_equipo'=>$model->id])->count(); 
$idalt = InvAlterno::find()->where(['id_equipo' => $model->id])->one();

         //   $intprod = intval($idproducto);

            if ($idalterno == 0) {

            	?>

            	<?= Html::a('<i class="fa fa-pencil-square-o"></i> '.Yii::t('app', 'Agregar'), ['inv-alterno/create', 'id' => $model->id, 'tab' => 'personal'], ['class' => 'btn btn-primary btn-sm', 'id' => 'update-data']) ?>



	<?php 
}elseif ($idalterno > 0) {
	echo Html::a('<i class="fa fa-pencil-square-o"></i> '.Yii::t('app', 'Editar'), ['inv-alterno/update', 'id' => $idalt->id, 'tab' => 'personal'], ['class' => 'btn btn-primary btn-sm', 'id' => 'update-data']);
}
    //if(Yii::$app->user->can('/soporte/inv-equipos/update')) {
            	
		?>
		
	</div>
	</h2>
  </div><!-- /.col -->
</div>

<div class="row">

<?php 

 if ($idalterno == 0) {
 ?>
<div class="col-md-12 col-sm-12 col-xs-12">Equipo no se encuentra en sede alterna
</div>
	<?php 
}elseif ($idalterno > 0) {

$sql ="SELECT 
  cat_planteles.nombre as plantel, 
  cat_motivo.nombre, 
  inv_alterno.ubicacion, 
  inv_alterno.id, 
  inv_alterno.usuario, 
  inv_alterno.observaciones,
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

?>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label edusecArLangCss"><strong>Folio</strong></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= $datos["id"]?></div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label edusecArLangCss"><strong><?= $model->getAttributeLabel('progresivo') ?></strong></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= $model->progresivo ?></div>
	</div>
<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label edusecArLangCss"><strong>Motivo</strong></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= $datos["nombre"]?></div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label edusecArLangCss"><strong>Plantel Destino</strong></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= $datos["plantel"]?></div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label edusecArLangCss"><strong>Ubicacion temporal</strong></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= $datos["ubicacion"]?></div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label edusecArLangCss"><strong>Usuario</strong></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= $datos["usuario"]?></div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label edusecArLangCss"><strong>Area:</strong></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= $datos["area"]?></div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">	
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label edusecArLangCss"><strong>Equipamiento Adicional:</strong></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= $datos["observaciones"]?></div>
	</div>

<div class="col-md-12 col-sm-12 col-xs-12">
<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label edusecArLangCss"></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= Html::a('<i class="fa fa-pencil-square-o"></i> '.Yii::t('app', 'Imprimir'), ['/soporte/inf-pdf/tempo', 'id' => $model->id, 'tab' => 'personal'], ['class' => 'btn btn-primary btn-sm', 'id' => 'update-data', 'target'=>'_blank']) ?></div>
	
</div>
		<?php 
}
?>

	


	

</div> <!---Main Row Div--->
