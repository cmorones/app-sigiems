<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\soporte\models\InvAlternoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inv Alternos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inv-alterno-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inv Alterno', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_equipo',
            'id_motivo',
            'id_plantel',
            'ubicacion',
            'id_area',
            'usuario',
            // 'observaciones',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'observaciones2',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
