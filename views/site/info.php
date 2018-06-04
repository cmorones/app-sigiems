<?php
/* @var $this yii\web\View */$this->title = 'APP-SISMA';
use yii\helpers\Html;
use app\modules\soporte\models\InvBajas;
use app\modules\admin\models\CatPlanteles;
use app\modules\soporte\models\InvEquipos;
use app\modules\soporte\models\InvImpresoras;
use app\modules\soporte\models\InvNobreak;

/*Yii::$app->telegram->sendMessage([
  'chat_id' => -224731334,
  'text' => "mensaje de prueba",
  ]);*/




/*ii::$app->telegram2->sendMessage([
  'chat_id' => 445074022,//425116723,
  'text' => "0pZTsBqHyym+enDc=|yyIQkt20X3gPVJLJa3yvpk0bymI= ecdsa-sha2-nistp256 AAAAE2VjZHNhLXNoYTItbmlzdHAyNTYAAAAIbmlzdHAyNTYAAABBBIcMq8ePkK7HAIF4bc4X6yvlQ+CG9lAzyGc7LQ7Apruuh+Oazb+4DKZkJz07yjyFCAIMSeehRKAz9jjPW3+99xQ=
|1|mqXBCVm7aUWDifjZwxbChvJ5EO4=|xix0juTU+SQd9Co4jrbQntBxm2U= ecdsa-sha2-nistp256 AAAAE2VjZHNhLXNoYTItbmlzdHAyNTYAAAAIbmlzdHAyNTYAAABBBOP4UMxX8y2Ua4lmLwxrmU700mHa9u5w+6NG/7WCl+Nb5yYvi9+suelSHGMGydvDGyD4NUFrMUNk+Qn14hbAZD4=
|1|luVyWi8HYJz3y1OhxJ/KeHa5H0M=|N5pweB5cjyxgKBaqrps8BHo/UO8= ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQDspavrFxfoR/15mUUFV1tf5zRS5EthpbIxrtm0vM7jucTurA7FI9/DS60NpM8YKFjbAt4PoPqeDIXkJsJ2sVRkyVT4AH2BZLIPBMn+dx/K18jtNpg+07/YZSxKYWWNXxRzhLi1Bx/6JmmL5Y3+R+USOhMBVwyAp6CHAVMyhebu9oNXP6AFQHlu56/Fml5w4yj3GsPke8YaY5Bg2mEFlqshKLQ2ffBwRAt/8EDngXbhyzVSAy0mgcBNXBJI25xy/8GkA7Oq7ZV/8REFWJp950UdYbW7nrp7vOfb+XdypCnBuiU+BAXMKEDmcq+HV1jNVnqVYzfgeQV1PlQ1d6Tb7bm9",
  ]);*/



//$plantel = @Yii::$app->user->identity->id_plantel;
$count1t = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_equipos")->queryScalar();
$count1 = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_equipos WHERE inv_equipos.estado=1")->queryScalar();
$count21 = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_equipos WHERE inv_equipos.estado=2")->queryScalar();
$count31t = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_impresoras")->queryScalar();
$count31 = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_impresoras WHERE inv_impresoras.estado=1")->queryScalar();
$count41 = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_impresoras WHERE inv_impresoras.estado=2")->queryScalar();
$count51t = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_nobreak")->queryScalar();
$count51 = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_nobreak WHERE inv_nobreak.estado=1")->queryScalar();
$count61 = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_nobreak WHERE inv_nobreak.estado=2")->queryScalar();



$plantel = @Yii::$app->user->identity->id_plantel;
$countt = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_equipos WHERE inv_equipos.id_plantel=$plantel")->queryScalar();
$count = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_equipos WHERE inv_equipos.estado=1 AND inv_equipos.id_plantel=$plantel")->queryScalar();
$count2 = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_equipos WHERE inv_equipos.estado=2 AND inv_equipos.id_plantel=$plantel")->queryScalar();
$count3t = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_impresoras WHERE inv_impresoras.id_plantel=$plantel")->queryScalar();
$count3 = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_impresoras WHERE inv_impresoras.estado=1 AND inv_impresoras.id_plantel=$plantel")->queryScalar();
$count4 = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_impresoras WHERE inv_impresoras.estado=2 AND inv_impresoras.id_plantel=$plantel")->queryScalar();
$count5t = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_nobreak WHERE inv_nobreak.id_plantel=$plantel")->queryScalar();
$count5 = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_nobreak WHERE inv_nobreak.estado=1 AND inv_nobreak.id_plantel=$plantel")->queryScalar();
$count6 = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_nobreak WHERE inv_nobreak.estado=2 AND inv_nobreak.id_plantel=$plantel")->queryScalar();


?>

  


                <div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-dashboard"></i> Dashboard |<small> Inventario de Equipos propiedad del IEMS</small>        </h1>
       

    </section>
  
	<div class="callout callout-info show msg-of-day" >
	    <h4><i class="fa fa-bullhorn"></i> Mensaje del dia</h4>
	    <marquee onmouseout="this.setAttribute('scrollamount', 6, 0);" onmouseover="this.setAttribute('scrollamount', 0, 0);" scrollamount="6" behavior="scroll" direction="left">Bienvenido al Sistema Integral de Gestion IEMS </marquee>
	</div>

  <section class="content">
        

     <?php  
              if(Yii::$app->user->can('mostrarEstadistcosTodos')) {
            ?>


      <div class="row">
      <section class="col-lg-2">
      </section>
    <section class="col-lg-6">
        <div class="nav-tabs-custom" id="notice-board">
  
        <table class="table table-striped table-bordered" >
        <tr>
          <th colspan="4" rowspan="" headers="" scope="">Inventario de Equipos propiedad del IEMS</th>
        </tr>
         <tr>
         <th>Plantel</th>
            <th>S.O. Linux</th>
            <th>S.O. Windows</th>
            <th>Internet</th>
            <th>Total Equipos</th></tr>

            <?php

              $resultado = CatPlanteles::find()->orderBy('id')->all();//InvEquipos::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('modelo')->all();
              $i=1;
              foreach ($resultado as $value) {

                $sql = "SELECT 
  count(inv_equipos.id) cuenta
FROM 
  public.inv_equipos, 
  public.inv_so, 
  public.cat_so
WHERE 
  inv_equipos.id = inv_so.id_equipo AND
  inv_so.id_so = cat_so.id AND
  inv_equipos.id_plantel =".$value['id']." AND
  inv_so.id_so in(1,2,3,6,15);";

  $eqwindows = \Yii::$app->db->createCommand($sql)->queryScalar();
  $grantotal = app\modules\soporte\models\InvEquipos::find()->where(['id_plantel'=>$value['id']])->count();
  $eqlinux = $grantotal - $eqwindows ;


            ?>
            <tr>
              <td><?=$value['nombre']?></td>  
             <td><?= $eqlinux?></td> 
              <td><?= $eqwindows?></td> 
               <td><?=$grantotal ?></td>  
              <td><?=$grantotal ?></td>  
            </tr>
            <?php 
          }


               
                $sql = "SELECT 
  count(inv_equipos.id) cuenta
FROM 
  public.inv_equipos, 
  public.inv_so, 
  public.cat_so
WHERE 
  inv_equipos.id = inv_so.id_equipo AND
  inv_so.id_so = cat_so.id AND
  inv_so.id_so in(1,2,3,6,15);";

  $graneqwindows = \Yii::$app->db->createCommand($sql)->queryScalar();
  $grangrantotal1 = app\modules\soporte\models\InvEquipos::find()->count();
  $grangrantotal2 = app\modules\soporte\models\InvEquipos::find()->where(['id_plantel'=>23])->count();
  $graneqlinux = $grantotal - $eqwindows ;
  $grangrantotal = $grangrantotal1 - $grangrantotal2;

          ?>

             <tr>
            <td><b>Total</b></td>
             <td><?= $graneqlinux?></td> 
              <td><?= $graneqwindows?></td> 
               <td><?=$grangrantotal ?></td>  
              <td><?=$grangrantotal ?></td> 
          </tr>
        </table>
   
    </section>
    


     <?

   }

   ?>
</div><!-- /.row (main row) -->