<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\soporte\models\InvImpresorasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventario de  Impresoras';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="inv-impresoras-index">

      <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h1 class="box-title"><i class="fa fa-list-alt"></i> <?php echo $this->title ?></h1></div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <div class=" box view-item col-xs-12 col-lg-12">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'progresivo',
            //'id_tipo',
            'marca',
            'modelo',
            'serie',
            'estado',
            // 'id_plantel',
            'id_area',
            'id_piso',
            'antiguedad',
            // 'observaciones',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
  <p>
        <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i>Agregar ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
