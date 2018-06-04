<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\soporte\models\InvAlternoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equipos en sedes alternas';
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
           // ['class' => 'yii\grid\SerialColumn'],

            'id',
          // 'catProgresivo.progresivo',
                    [
         'attribute' => 'progresivo',
         'value' => 'catProgresivo.progresivo'
         ],
                       
                        //'id_motivo',
                                [
              'attribute'=>'id_plantel',
              'value' => 'catPlanteles.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatPlanteles::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            'ubicacion',
             [
              'attribute'=>'id_area',
              'value' => 'catAreas.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatAreas::find()->where(['id_plantel'=>23])->orderBy('nombre')->asArray()->all(),'id_area','nombre')
            ],
            'usuario',
            'observaciones2',
            'observaciones',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            

          //  ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
</div>
</div>
</div>
