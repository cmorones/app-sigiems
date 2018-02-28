<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\consumibles\models\ConsumiblesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consumibles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consumibles-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar Consumibles', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
           [
              'attribute'=>'id_medida',
              'value' => 'catMedidas.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\consumibles\models\CatMedidas::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            'nombre',
           // 'detalle',
            // 'imagen',
             'precio',
             'status',
             'id_area',
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
</div>