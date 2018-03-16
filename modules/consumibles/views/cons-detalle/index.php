<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\consumibles\models\ConsDetalleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cons Detalles';
$this->params['breadcrumbs'][] = $this->title;
?>

<br>
<br>
<br>
<br>
<br>
<div class="box box-default">
   <div class="box-header with-border">
        <h3 class="box-title"><i class="glyphicon glyphicon-cog"></i>Consumibles</h3>
   </div>
   <div class="box-body">
   <div class="box-body table-responsive">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cons Detalle', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_salida',
            'id_cons',
            'descripcion',
            'cantidad',
            // 'estado',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
</div>
</div>
