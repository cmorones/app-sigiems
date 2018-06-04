<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\consumibles\models\ConsEntradasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cons Entradas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-12" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">

<div class="cons-entradas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar Entradas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
           // 'id_consumible',
            [
              'attribute'=>'id_consumible',
              'value' => 'datos.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\consumibles\models\Consumibles::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            'fecha',
            'cantidad',
          //  'observaciones',
            // 'estado',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

           
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
</div>
</div>
</div>
