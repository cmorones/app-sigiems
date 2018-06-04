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
<div class="col-xs-12" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
     <h1>Contadores</h1>
<table class="table table-striped table-bordered">
    <tr>
        <th>Periodo</th>
      
        <th>Mostrar</th>
    </tr>

<?php 


$resultado = \Yii::$app->db->createCommand('SELECT * FROM cat_anos where status=1')->queryAll();


foreach ($resultado as $value) {

?>

<tr>
    <td><?=$value['nombre']?></td>
    <td> <?= Html::a('<i class="fa fa-plus-square" aria-hidden="true"></i>Registar', ['mostrar', 'idp' => $value['id']], ['class' => 'btn btn-success']) ?></td>            
</tr>
    <?php
    # code...
}

?>





</table>
   
     </div>
   </div>
  </div>
</div>




<?php

/*use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\soporte\models\InvContadoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/*$this->title = 'Inv Contadores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inv-contadores-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inv Contadores', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_plantel',
            'id_impresora',
            'id_periodo',
            'id_mes',
            // 'contador_inicial',
            // 'contador_final',
            // 'porcentaje',
            // 'status_cambio',
            // 'documento',
            // 'status',
            // 'observaciones',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); */?></div>
