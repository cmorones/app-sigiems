<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\modules\soporte\models\TipoEquipo;
use app\modules\soporte\models\CatMarca;
use app\modules\soporte\models\CatModelo;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\soporte\models\InvEquiposSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detalle de Movimiento de Bienes' . '-' . $id;
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<br>



 <div class="mov-detalle-index">

  <div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-th-list"></i> 
  <?php echo $this->title ?></h3></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
  <div class="col-xs-4 left-padding">

           
             <?= Html::a('Agregar Item', ['create', 'id'=>$id], ['class' => 'btn btn-block btn-success']) ?>


<?//= Html::button('Agregar Equipos', ['id' => 'modelButton', 'value' => \yii\helpers\Url::to(['mov-bienes/create']), 'class' => 'btn btn-success']) ?>

<?//= Html::a('Create List', ['create'], ['class' => 'btn btn-success']) ?>

  </div>
   <div class="col-xs-4 left-padding">
    <?= Html::a(Yii::t('app', 'Regresar'), ['mov-bienes/index', 'id'=>$id], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
 
  </div>
</div>

</div>

<div class="col-xs-6" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">
     <div class="mov-detalle-index">
 <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
           // 'id_mov',
            'descripcion',
            'cantidad',
           // 'estado',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            
               [ 'attribute' => 'Modificar',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data,$id){


                  return (Html::a('<center><span class="glyphicon glyphicon-print"></span> PDF</center>', [
                            '/soporte/mov-detalle/update',
                            'id' => $data->id,
                             'idp' => $data->id_mov,
                        ], [
                            'class' => 'btn btn-success btn-sm',
                            'target' => '_blank',
                        ]));
              
            }
              ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
     </div>
   </div>
  </div>
</div>






