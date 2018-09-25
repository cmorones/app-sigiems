<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\soporte\models\SearchInvAsignaciones */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inv Asignaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<br>
<br>
<div class="col-xs-12" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
      

        <?= Html::a('<i class="fa fa-plus-square" aria-hidden="true"></i>Agregar', ['create', 'idp' => $idp], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'folio',
            'fecha',
            'progresivo',
          //  'id',
              [
              'attribute'=>'id_periodo',
              'value' => 'catAnos.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\CatAnos::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
             [
              'attribute'=>'id_mes',
              'value' => 'catMeses.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\CatMeses::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
           // 'id_plantel',

            [
              'attribute'=>'id_plantel',
              'value' => 'catPlanteles.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatPlanteles::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
             [
              'attribute'=>'id_area',
              'value' => 'catAreas.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\CatAreas::find()->orderBy('nombre')->asArray()->all(),'id_area','nombre')
            ],
            // 
            // 
            [
              'attribute'=>'estado',
              'value' => 'catEstado.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\CatEstado::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
             'resguardante',
                [ 'attribute' => 'imprimir',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){

                 if($data->estado ==1 ){
                  return (Html::a('<center><span class="glyphicon glyphicon-print"></span> PDF</center>', [
                            '/soporte/inf-pdf/asign',
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
            // 'observaciones',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

              [ 'attribute' => 'Modificar',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){

                if($data->estado ==1 ){
           
                  return (Html::a('<center><span class="glyphicon glyphicon-share"></span> Modificar</center>', [
                            '/soporte/inv-asignaciones/update',
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
                [ 'attribute' => 'Agregar Item',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){

                 if($data->estado ==1 ){
           
                  return (Html::a('<center><span class="glyphicon glyphicon-share"></span> Agregar</center>', [
                            '/soporte/asign-detalle/index',
                            'id' => $data->id,
                            'idp' => $data->id_periodo,
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
                
                  
                 return (Html::a('<center><span class="glyphicon glyphicon-floppy-open"></span></center>', ['/soporte/inv-asignaciones/docto','id'=>$data->id], ['title' => 'Subir']));
              }elseif($data->estado == 2 ) {
 
                 return (Html::a('<center><span class="glyphicon glyphicon-download"></span> PDF</center>', [
                            '/soporte/inv-asignaciones/pdf',
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
