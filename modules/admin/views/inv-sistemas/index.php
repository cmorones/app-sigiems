<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\InvSistemasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inv Sistemas';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="inv-sistemas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar Sistema', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nombre',
            'fundamento',
            'objetivo',
            //'clasificacion',
            [
              'attribute'=>'clasificacion',
              'value' => 'catClasificacion.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatClasificacion::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            [
              'attribute'=>'tipo',
              'value' => 'catTiposSis.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatTiposSis::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            'anio_dev',
            // 'tipo',
            // 'desarrollado',
            // 'ult_act',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
