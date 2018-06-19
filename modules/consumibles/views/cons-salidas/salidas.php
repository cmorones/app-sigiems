<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\consumibles\models\ConsSalidasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cons Salidas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cons-salidas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar Salida', ['index'], ['class' => 'btn btn-success']) ?>
    </p>
    


     <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Articulos Disponibles</h3>
                            </div>
                            <div class="panel-body">
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
           // 'folio',
            'sfolio',
           // 'id_plantel_origen',
           // 'id_area_origen',
           //  'id_plantel_destino',
                [
              'attribute'=>'id_plantel_destino',
              'value' => 'catPlanteles2.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatPlanteles::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
          //   'id_area_destino',
               [
              'attribute'=>'id_area_destino',
              'value' => 'catAreas2.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatAreas::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
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
            // 'total',
            // 'fecha_reg',
            // 'observaciones',
            // 'autoriza',
            // 'entrega',
            // 'recibe',
            // 'docto',
            // 'estado',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            
               [ 'attribute' => 'imprimir',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){

                       if($data->estado ==1 ){
                  return (Html::a('<center><span class="glyphicon glyphicon-print"></span> PDF</center>', [
                            '/consumibles/inf-pdf/index',
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

              [ 'attribute' => 'Modificar',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){

                  if($data->estado ==1 ){
           
                  return (Html::a('<center><span class="glyphicon glyphicon-share"></span> Modificar</center>', [
                            '/consumibles/cons-salidas/update',
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

               [ 'attribute' => 'Modificar1',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){


              if($data->estado ==1 ){
                  return (Html::a('<center><span class="glyphicon glyphicon-share"></span> Modificar Items</center>', [
                            '/consumibles/cons-salidas/items',
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
                
                  
                 return (Html::a('<center><span class="glyphicon glyphicon-floppy-open"></span></center>', ['/consumibles/cons-salidas/docto','id'=>$data->id], ['title' => 'Subir']));
              }elseif($data->estado == 2 ) {
 
                 return (Html::a('<center><span class="glyphicon glyphicon-download"></span> PDF</center>', [
                            'cons-salidas/pdf',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-success btn-sm',
                            'target' => '_blank',
                        ]));
              }
              
                       }
              ],
    
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
</div>
</div>
