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

$this->title = 'Movimiento de Bienes Informáticos';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<br>





<div class="inv-equipos-index">

  <div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-th-list"></i> 
  <?php echo $this->title ?></h3></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
  <div class="col-xs-4 left-padding">

           
             <?= Html::a('Agregar Movimientos', ['create'], ['class' => 'btn btn-block btn-success']) ?>


<?//= Html::button('Agregar Equipos', ['id' => 'modelButton', 'value' => \yii\helpers\Url::to(['mov-bienes/create']), 'class' => 'btn btn-success']) ?>

<?//= Html::a('Create List', ['create'], ['class' => 'btn btn-success']) ?>

  </div>
  <div class="col-xs-4 left-padding">
 
      <?//= Html::a(Yii::t('app', 'PDF'), ['/export-data/export-to-pdf', 'model'=>get_class($searchModel2)], ['class' => 'btn btn-block btn-warning', 'target'=>'_blank']) ?>

  </div>
  <div class="col-xs-4 left-padding">
 
      <?//= Html::a(Yii::t('app', 'EXCEL'), ['/export-data/export-excel', 'model'=>get_class($searchModel2)], ['class' => 'btn btn-block btn-primary', 'target'=>'_blank']) ?>

  </div>
  </div>
</div>

 
</div>

<div class="col-xs-12" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
   <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
          //  'id_plantel',
            'sfolio',
            'fecha',
            [
              'attribute'=>'id_plantel',
              'value' => 'catPlanteles.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatPlanteles::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],

            [
              'attribute'=>'area_origen',
              'value' => 'catAreas1.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\CatAreas::find()->orderBy('nombre')->asArray()->all(),'id_area','nombre')
            ],
          //  'area_origen',
            [
              'attribute'=>'plantel',
              'value' => 'catPlanteles2.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatPlanteles::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
          //  'area_destino',
             [
              'attribute'=>'area_destino',
              'value' => 'catAreas2.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\CatAreas::find()->orderBy('nombre')->asArray()->all(),'id_area','nombre')
            ],
            // 'suministro',
            // 'prestamo',
            // 'salida',
            // 'equipo',
            // 'refaccion',
            // 'material',
            // 'tipo_manto',
            // 'actualizacion',
            // 'distribucion',
            // 'garantia',
            // 'condiciones',
            // 'observaciones',
            // 'autoriza',
            // 'entrega',
            // 'recibe',
             [
              'attribute'=>'estado',
              'value' => 'catEstado.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\CatEstado::find()->orderBy('nombre')->asArray()->all(),'id_area','nombre')
            ],
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

               [ 'attribute' => 'imprimir',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){

                 if($data->estado ==1 ){
                  return (Html::a('<center><span class="glyphicon glyphicon-print"></span> PDF</center>', [
                            '/soporte/inf-pdf/movs',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-success btn-sm',
                            'target' => '_blank',
                        ]));
                 }else{

                  return ('<center>'.Html::img('@web/images/checked.png').'</center>');
                }
              
            }
              ],

               [ 'attribute' => 'Agregar Item',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){

                 if($data->estado ==1 ){
           
                  return (Html::a('<center><span class="glyphicon glyphicon-share"></span> Agregar</center>', [
                            '/soporte/mov-detalle/index',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-info btn-sm',
                           // 'target' => '_blank',
                        ]));
                 }else{

                  return ('<center>'.Html::img('@web/images/checked.png').'</center>');
                }
             
              
            }
              ],

               [ 'attribute' => 'Modificar',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){

                if($data->estado ==1 ){
           
                  return (Html::a('<center><span class="glyphicon glyphicon-share"></span> Modificar</center>', [
                            '/soporte/mov-bienes/update',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-info btn-sm',
                           // 'target' => '_blank',
                        ]));
                }else{

                  return ('<center>'.Html::img('@web/images/checked.png').'</center>');
                }
             
              
            }
              ],


                  [ 'attribute' => 'Subir Archivo',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){
              //return "<a href=\"?r=country/view&id={$data->validacion}\">{$data->tipo_baja}</a>";} BajasCertificado
           //   $docto = app\modules\soporte\models\BajasDictamen::find()->where(['id_baja'=>$data->id])->one();
           //   $dictaminado = app\modules\soporte\models\BajasDictamen::find()->where(['id_baja'=>$data->id])->count();
           //   $dicta = intval($dictaminado);
             
              if($data->estado ==1 ){
                
                  
                 return (Html::a('<center><span class="glyphicon glyphicon-floppy-open"></span></center>', ['/soporte/mov-bienes/docto','id'=>$data->id], ['title' => 'Subir']));
              }elseif($data->estado == 2 ) {
 
                 return (Html::a('<center><span class="glyphicon glyphicon-download"></span> PDF</center>', [
                            '/soporte/mov-bienes/pdf',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-success btn-sm',
                            'target' => '_blank',
                        ]));
              }
              
                       }
              ],

            /*  [ 'attribute' => 'Subir Archivo',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){
              //return "<a href=\"?r=country/view&id={$data->validacion}\">{$data->tipo_baja}</a>";} BajasCertificado
              //$docto = app\modules\soporte\models\BajasDictamen::find()->where(['id_baja'=>$data->id])->one();
              //$dictaminado = app\modules\soporte\models\BajasDictamen::find()->where(['id_baja'=>$data->id])->count();
              //$dicta = intval($dictaminado);
             
              if($data->estado ==1){
                
                  
                 return (Html::a('<center><span class="glyphicon glyphicon-floppy-open"></span></center>', ['/soporte/mov-bienes/docto','id'=>$docto['id'], 'idb' =>$data->id, 'idp'=>$data->id_periodo], ['title' => 'Subir']));
              }elseif($data->estado ==2 ) {
 
                 return (Html::a('<center><span class="glyphicon glyphicon-download"></span> PDF</center>', [
                            '/soporte/bajas-dictamen/pdf',
                            'id' => $docto['id'],
                        ], [
                            'class' => 'btn btn-success btn-sm',
                            'target' => '_blank',
                        ]));
              }
              else{

                 return ('<center>'.Html::img('@web/images/unchecked.png').'</center>');
               
                                      }
                       }
              ],*/
        ],
    ]); ?>
<?php Pjax::end(); ?>
     </div>
   </div>
  </div>
</div>



