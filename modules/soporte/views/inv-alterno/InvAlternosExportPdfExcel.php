<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
?>
<div class="emp-master-index">
    <?php
//	$org = app\models\Organization::find()->asArray()->one();
	$model->sort = false;
	$dispColumn = false;
	if($type == 'Excel') {
		echo "<meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" />";
		echo "<table><tr><th colspan='12'><h3>Excel</h3> </th> </tr> </table>";
		$dispColumn = true;
	}
    ?>
   <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'id',
          // 'catProgresivo.progresivo',
                    [
         'attribute' => 'progresivo',
         'value' => 'catProgresivo.progresivo'
         ],
                       
                        //'id_motivo',
                                [
              'attribute'=>'id_plantel',
              'value' => 'catPlanteles.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatPlanteles::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            'ubicacion',
             [
              'attribute'=>'id_area',
              'value' => 'catAreas.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatAreas::find()->where(['id_plantel'=>23])->orderBy('nombre')->asArray()->all(),'id_area','nombre')
            ],
            'usuario',
            'observaciones2',
            'observaciones',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            

          //  ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
