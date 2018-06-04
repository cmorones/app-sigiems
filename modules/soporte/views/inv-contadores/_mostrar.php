
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\soporte\models\InvContadoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inv Contadores';
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
<?php Pjax::end(); ?></div>
