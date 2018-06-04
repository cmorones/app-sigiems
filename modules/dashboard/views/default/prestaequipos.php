   <?php
   use yii\helpers\Html; 
use yii\helpers\Url;
   use app\modules\dashboard\models\EventsPrestamos;

   ?>
   <br>
   <br>
   <br>
   <div class="box box-info box-solid">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="ion ion-calendar"></i>Calendario de Prestamos IEMS</h3>
  </div>
  <br>

     <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
          
<?= Html::a('Regresar al calendario', ['/dashboard/events-prestamos'], ['class' => 'btn btn-primary btn-sm']) ?>

    </div>
    </div>
   <div class="row">
      <div class="col-sm-12 col-xs-12">
           <h1>Listado de Prestamos</h1> 
         <table class="table table-striped table-bordered">
      <tr>
        <th>Num</th>
        <th>Fecha de Inicio</th>
        <th>Fecha de Termino</th>
        <th>Titulo</th>  
        <th>Detalle</th>
        <th>Tipo</th>
        <th>Documento</th>
        <th>Accion</th>
        </tr>

        <?php 

//$plantel = Yii::$app->user->identity->id_plantel;
//$resultado = \Yii::$app->db->createCommand('SELECT * FROM inv_bajas where estado_baja=1 and id_plantel='.$plantel)->queryAll();

//$resultado = InvBajas::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('modelo')->all();

$resultado = EventsPrestamos::find()->where(['is_status'=> 0])->all();
$i=1;
foreach ($resultado as $value) {

if ($value->event_type==1) {
	$valor = "<span class='label bg-orange'>En Proceso</span>";
}
if ($value->event_type==2) {
	$valor = "<span class='label bg-blue'>Pendiente</span>";
}
if ($value->event_type==3) {
	$valor = "<span class='label bg-green'>Terminando</span>";
}
if ($value->event_type==4) {
	$valor = "<span class='label bg-red'>Fuera de Tiempo</span>";
}

?>
        <tr>
        <td><?=$i?></td>
        <td><?=$value->event_start_date?></td>
        <td><?=$value->event_end_date?></td>
        <td><?=$value->event_title?></td>
        <td><?=$value->event_detail?></td>
        <td><span><?=$valor?></span></td>
        <td><span><?=$value->documento?></span></td>
        <td><?= Html::a('Agregar Docto', ['/dashboard/events-prestamos/docto', 'event_id'=>$value->event_id], ['class' => 'btn btn-info btn-sm']) ?></td>
        </tr>

        <?php
        $i++;
      }

      ?>

     </table>
   
     </div>
   </div>
   </div>

   <?php
  yii\bootstrap\Modal::begin([
    'id' => 'eventModal',
    'size'=>'modal-lg',
    'header' => "<div class='row'><div class='col-xs-10'><h3>Evento</h3></div><div class='col-xs-10'>".Html::a('Delete', ['#'], ['class' => 'btn btn-danger pull-right', 'style' => 'margin-top:5px'])."</div></div>",
    'header' => "<h3>".Yii::t('app', 'Evento')."</h3>",
  ]);

  yii\bootstrap\Modal::end();
?>
  