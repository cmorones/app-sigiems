<?php
use app\modules\consumibles\models\ConsDetalle;
use app\modules\consumibles\models\Consumibles;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\Html;

$data = ConsDetalle::find()->joinWith('datos')->where(['id_salida'=>$id])->all();

/*if ($articulo==0) {
	$data = InvConsumibles::find()->joinWith('datos')->where(['>', 'existencia', 0])->orderBy(['consumibles.nombre' => SORT_ASC])->all();

}else{

 $data = InvConsumibles::find()->joinWith('datos')->where(['>', 'existencia', 0])->andWhere(['consumibles.id'=>$articulo])->orderBy(['consumibles.nombre' => SORT_ASC])->all();
}*/


?>
<br>
<br>
<br>
<br>
<br>
   <p>
        <?= Html::button('Agregar Entrada', ['value'=>Url::to(['/consumibles/cons-detalle/create', 'id'=>$id]),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>

           <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Articulos Disponibles <span style="color: red"></span></h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Consumible</th>
                                                        <th>Medida</th>
                                                        <th>Cantidad</th>
                                                        <th>Accion</th>
                                                       
                                                    </tr>
                                                </thead>
                                             <tbody>
        
        <?php
        $i =1;
        foreach ($data as $value) {

                $sql = "SELECT m.nombre FROM consumibles as c, cat_medidas as m where c.id_medida = m.id  and c.id=$value->id_cons";
                     $medida = Consumibles::findBySql($sql)->one();

            ?>

     
                                               
                                                    <tr>
                                                        <td><?=$i?></td>
                                                        <td><?=$value->datos->nombre?></td>
                                                        <td><?=$medida['nombre']?></td>
                                                        <td><?=$value->cantidad?></td>
                                                        
                                                        <td>       <a href="javascript:void(0)" class="btn btn-primary" id="sa-basic" onclick="delItem(<?=$value->id?>,<?=$value->id_salida?>,<?=$value->cantidad?>)"><i class="fa fa-shopping-cart"></i> Eliminar</a></td>
                                                       
                                                    </tr>
                                                  
                                               


      
                <?php 
$i++;
            } ?>
 </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
      Modal::begin([
       // 'header'=>'<h4>Form</h4',
        'id'=>'modal',
        'size'=>'modal-lg',
        ]);

      echo "<div id='modalContent'></div>";

      Modal::end();


    ?>
                        </div>