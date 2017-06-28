<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\soporte\models\InvBajasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventario de Bajas';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>

<div class="inv-impresoras-index">

      <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h1 class="box-title"><i class="fa fa-list-alt"></i> <?php echo $this->title ?></h1></div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<p>
        <?= Html::a('<i class="glyphicon glyphicon-chevron-left" aria-hidden="true"></i>Regresar', ['index', 'idp'=>$idp], ['class' => 'btn btn-info btn-sm']) ?>
    </p>
  <div class=" box view-item col-xs-12 col-lg-12">
   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'emptyCell'=>'-',

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'progresivo',
           // 'id_tipo',
              [
              'attribute'=>'marca',
              'value' => 'catMarca.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatMarca::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            [
              'attribute'=>'modelo',
              'value' => 'catModelo.modelo',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatModelo::find()->orderBy('modelo')->asArray()->all(),'id','modelo')
            ],
            'serie',
           
          
              [
              'attribute'=>'id_tipo',
              'value' => 'tipoBaja.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\TipoEquipo::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            // 'id_periodo',
            // 'id_plantel',
               [
              'attribute'=>'id_area',
              'value' => 'catAreas.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatAreas::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('nombre')->asArray()->all(),'id_area','nombre')
            ],

             [
              'attribute'=>'id_piso',
              'value' => 'catPiso.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatPisos::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            'fecha_baja',
            //'tipo_baja',
             [
              'attribute'=>'estado_baja',
              'value' => 'estadoBaja.nombre',
              'contentOptions' => function($model)
                    {
                        return ['style' => 'color:' . $model->estadoBaja->color];
                    },
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\EstadoBaja::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            // 'observaciones',
          // 'dictamen',
           // 'certificado',
            // 'bloq',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

               [
             'class' => 'app\components\CustomActionColumn',
             'template' => '{dictaminar} {delete}',
             'buttons' => [
             'dictaminar' => function ($url, $model, $idp) {
               
                $url .= '&idp=' . $idp;
                return (Html::a('<span class="glyphicon glyphicon-search"></span>', $url, ['title' => Yii::t('app', 'Dictaminar')]));
            },
        'delete' => function ($url, $model) {
                return ((Yii::$app->user->can("/soporte/inv-bajas/delete")) ? Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, ['title' => Yii::t('app', 'Delete'), 'data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),'method' => 'post'],]) : '');
            }
      ],
            ],
        ],
        'tableOptions' =>['class' => 'table table-striped table-bordered'],

    ]); ?>
        <p>
        <?= Html::a('<i class="fa fa-plus-square" aria-hidden="true"></i>Agregar Baja', ['create', 'idp'=>$idp], ['class' => 'btn btn-success']) ?>
    </p>
</div>
