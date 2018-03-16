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
        <?= Html::a('Create Cons Salidas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'folio',
            'sfolio',
            'id_plantel_origen',
            'id_area_origen',
            // 'id_plantel_destino',
            // 'id_area_destino',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
