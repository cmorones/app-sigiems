<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\soporte\models\InvDesechosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventario de Desechos';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="inv-desechos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('<i class="glyphicon glyphicon-chevron-left" aria-hidden="true"></i>Regresar', ['index', 'idp'=>$idp], ['class' => 'btn btn-info btn-sm']) ?>
    </p>
<div class=" box view-item col-xs-12 col-lg-12">
<br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'id_plantel',
             [
              'attribute'=>'tipo',
              'value' => 'catDesechos.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\CatDesechos::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            'marca',
            'modelo',
            'serie',
            // 'id_periodo',
            [
              'attribute'=>'id_area',
              'value' => 'catAreas.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\CatAreas::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('nombre')->asArray()->all(),'id_area','nombre')
            ],
            [
              'attribute'=>'id_piso',
              'value' => 'catPiso.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\CatPiso::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            // 'observaciones',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'Voltaje',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        <p>
        <?= Html::a('<i class="fa fa-plus-square" aria-hidden="true"></i>Agregar Desecho', ['create', 'idp'=>$idp], ['class' => 'btn btn-success']) ?>
    </p>
</div>