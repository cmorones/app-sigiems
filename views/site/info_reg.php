<?php
/* @var $this yii\web\View */$this->title = 'APP-SISMA';
use yii\helpers\Html;
use app\modules\soporte\models\InvBajas;
use app\modules\admin\models\CatPlanteles;
use app\modules\soporte\models\InvEquipos;
use app\modules\soporte\models\InvImpresoras;
use app\modules\soporte\models\InvNobreak;


//$plantel = @Yii::$app->user->identity->id_plantel;
$count1 = \Yii::$app->db3->createCommand("SELECT COUNT(*) FROM aspirantes")->queryScalar();



?>
<br>
<br>
<br>
<br>
<br>
<div class="row">

        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><? echo $count1 ?></h3>

              <p>Aspirantes registrados 2017</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>

            <a href="#" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>

         
        
        <!-- ./col -->
      </div>
