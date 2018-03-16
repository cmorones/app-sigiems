<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\modules\consumibles\models\InvConsumibles;
use app\modules\consumibles\models\Consumibles;
use kartik\select2\Select2;

$items = ArrayHelper::map(InvConsumibles::find()->joinWith('datos')->where(['>', 'existencia', 0])->all(),'datos.id','datos.nombre');
?>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="row">
     
<?php

/*echo $form->field($model, 'state_1')->widget(Select2::classname(), [
    'data' => $data,
    'options' => ['placeholder' => 'Select a state ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    'pluginEvents' => [
       "select2:select" => "function() { // function to make ajax call here }",
    ]
]);*/




?>


    <div class="col-md-12">
        <b>BUSCAR: </b>
        <?php
            echo Select2::widget([
    'name' => 'articulo',
    'value' => '',
    'data' => $items,
    'options' => ['id'=>'articulo','placeholder' => 'Selecciona Articulo ...'],
     'pluginEvents' => [
       "select2:select" => "function() { // function to make ajax call here
            //alert(this.value);
            $.get('".Url::toRoute("cons-salidas/mostrar")."', { articulo : this.value})
                .done(function(data)
                {
                    $('#mostrar').html(data);
                });
        }",
    ],
]);
        ?>
   </div>
<br>
<br>
<br>
<br>
<br>

<br>
    <div class="col-md-6">
        <?php  echo Html::button('<i class="glyphicon glyphicon-ok"></i> Mostrar Todos',[
            'class'=>'btn btn-primary','onclick'=>'
            $.get("'.Url::toRoute('default/mostrar').'", { articulo : 0})
                .done(function(data)
                {
                    $("#mostrar").html(data);
                });
            ']);

            ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-10">
    </div>
                   
   <div class="col-sm-2">
                           <?= Html::a('<i class="fa fa-shopping-cart"></i> Carrito', ['shopping-cart/cart', 'tipo'=>1, 'descuento'=>0], ['class' => 'btn btn-block btn-success']) ?>
                 
     </div>
</div>




<div class="row">

       

    


     <div class="tab-content" id="mostrar">
 

   

           <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Articulos Disponibles</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nombre</th>
                                                        
                                                        <th>Medida</th>
                                                        <th>Existencia</th>
                                                        <th>Cantidad</th>
                                                        <th>Accion</th>
                                                       
                                                    </tr>
                                                </thead>
                                             <tbody>
        
        <?php
        $i =1;
        foreach ($data as $value) {


                        $sql = "SELECT m.nombre FROM consumibles as c, cat_medidas as m where c.id_medida = m.id  and c.id=$value->id_consumible";
                     $medida = Consumibles::findBySql($sql)->one();

            ?>

     
                                               
                                                    <tr>
                                                        <td><?=$i?></td>
                                                        <td><?=$value->datos->nombre?></td>
                                                        
                                                        <td><?=$medida['nombre']?></td>
                                                        <td><button class="btn btn-success waves-effect waves-light btn-xs m-b-5"><?=$value->existencia?></button></td>
                                                        <td><input class="cart_quantity_input" type="text" name="cantidad<?=$value->id_consumible?>" id="cantidad<?=$value->id_consumible?>"  autocomplete="off" size="2" ></td>
                                                        <td>       <a href="javascript:void(0)" class="btn btn-primary" id="sa-basic" onclick="addCart(<?=$value->id_consumible?>,<?=$value->existencia?>,document.getElementById('cantidad<?=$value->id_consumible?>').value)"><i class="fa fa-shopping-cart"></i> Agregar</a></td>
                                                       
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
                        </div>
                            </div>





                          

</div>
       