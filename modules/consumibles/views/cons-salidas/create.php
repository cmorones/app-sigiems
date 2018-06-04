<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\consumibles\models\ConsSalidas */

$this->title = 'Create Cons Salidas';
$this->params['breadcrumbs'][] = ['label' => 'Cons Salidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php



/* @var $this yii\web\View */
/* @var $model app\modules\ventas\models\Ordenes */

 $cart = Yii::$app->session['cart'];



?>
<br>
<br>
<br>
<br>
<br>
   <div class="col-xs-4 left-padding">
    <?= Html::a(Yii::t('app', 'Regresar'), ['shopping-cart/cart', 'tipo' => 1,  'descuento' => 0], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>

<div class="panel panel-color panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Registrar Venta</h3>
                            </div>
                            <div class="panel-body">
                               <div class="table-responsive cart_info">


				<table class="table table-striped">
					<thead>
						<tr class="cart_menu">
							<td class="image">Num</td>
							<td class="description">Producto</td>
							<td >Precio</td>
							<td class="quantity">Cantidad</td>
						
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php 

					 foreach ($cart as $key => $value) {
					 ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/cart/one.png" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?=$value['nombre']?></a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p><?=number_format($value['precio'],2)?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									
								<?=$value['cantidad']?>
									
							</td>
						
							
						</tr>

						<?php } ?>

					
						
					</tbody>
				</table>

                      <?= $this->render('_form', [
        'model' => $model,
        //'total'=>$total,
         ]) ?>
			</div>
                            </div>
                        </div>


