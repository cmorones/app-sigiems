<?php

use yii\helpers\Html;
use app\modules\consumibles\models\Consumibles;
$subtotal = 0;
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="panel panel-color panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Listado de articulos</h3>
                            </div>
                            <div class="panel-body">
                               <div class="table-responsive cart_info">


				<table class="table table-striped">
					<thead>
						<tr class="cart_menu">
							<td class="image">Num</td>
							<td class="description">Producto</td>
							<td >U. Medida</td>
							<td class="quantity">Cantidad</td>
							
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php 
					if ($cart) {
					$cuenta =1;
					 foreach ($cart as $key => $value) {

					 	$sql = "SELECT m.nombre FROM consumibles as c, cat_medidas as m where c.id_medida = m.id  and c.id=$key";
					 $medida = Consumibles::findBySql($sql)->one();
					 ?>
						<tr>
							<td class="cart_product">
								<?=$cuenta?>
							</td>
							<td class="cart_description">
								<h4><a href=""><?=$value['nombre']?></a></h4>
								<p>Web ID: <?=$key?></p>
							</td>
							<td class="cart_price">
								<p><?=$medida['nombre']?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="javascript:void(0)" onclick="itemDown(<?=$key ?>)"> -</a>
									<input class="cart_quantity_input" type="text" name="quantity_<?=$key ?>" id="quantity_<?=$key ?>" value="<?=$value['cantidad']?>" autocomplete="off" size="2" disabled>
									<a class="cart_quantity_down" href="javascript:void(0)" onclick="itemUp(<?=$key ?>)"> + </a>
								</div>
							</td>
						
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="javascript:void(0)" onclick="deleteItem(<?=$key ?>)"> <i class="fa fa-times"></i></a>
							</td>
						</tr>

						<?php
$cuenta ++;
						 }
							# code...
					} ?>

					
						
					</tbody>
				</table>


			</div>
                            </div>
                        </div>

                        	
<div class="col-lg-4">
</div>

<div class="col-lg-6">
                        <div class="panel panel-color panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> Total a Entregar</h3>
                            </div>
                            <div class="panel-body">
                     		       <form class="form-horizontal" role="form">

                             	<div class="total_area">
						<ul>
							
							<li>Total de ariculos: <span><strong><?=$cuenta-1 ?></strong></span></li>
							
						</ul>

				
                                                          
                                </form>
							
							<?= Html::a('<i class="fa fa-shopping-cart"></i> Siguiente', ['cons-salidas/create', 'total'=>$cuenta-1], ['class' => 'btn btn-block btn-success']) ?>

						
					</div>
                            </div>
                        </div>
                    </div>

		