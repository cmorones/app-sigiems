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

           
             <?//= Html::a('Agregar Equipos', ['create'], ['class' => 'btn btn-block btn-success']) ?>


<?= Html::button('Agregar Equipos', ['id' => 'modelButton', 'value' => \yii\helpers\Url::to(['mov-bienes/create']), 'class' => 'btn btn-success']) ?>

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
            'area_origen',
            'area_destino',
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
            // 'estado',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
     </div>
   </div>
  </div>
</div>


<?php
    Modal::begin([
        'id' => 'eventModal',
       // 'size'=>'modal-lg',
        'header' => "<h3>Registro</h3>",
    ]);

     echo "<div id='modelContent'></div>";

    yii\bootstrap\Modal::end();
?>
  

<script type="text/javascript" charset="utf-8">

$(function(){
    $('#modelButton').click(function(){
        $('.modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('value'));
    });
        
});
</script>
