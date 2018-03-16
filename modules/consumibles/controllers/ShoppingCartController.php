<?php

namespace app\modules\consumibles\controllers;
use Yii;
use Yii\web\Session;
use app\modules\consumibles\models\Consumibles;
use app\modules\consumibles\models\ConsSalidas;

class ShoppingCartController extends \yii\web\Controller
{
    public function actionIndex()
    {
       echo $id;
    }

     public function actionAdd($id,$cantidad)
    {
         $data = new Consumibles();
                $dataProduct = $data->getInfoProductBy($id);
                if (!isset(Yii::$app->session['cart'])) {
                        $cart[$id] = [
                                'nombre'=> $dataProduct['nombre'],
                                'precio'=> $dataProduct['precio'],
                                'cantidad'=> $cantidad,

                        ];
                }else{

                        $cart = Yii::$app->session['cart'];
                        if (array_key_exists($id,$cart)) {
                                  $cart[$id] = [
                                'nombre'=> $dataProduct['nombre'],
                                'precio'=> $dataProduct['precio'],
                                'cantidad'=> (int)$cart[$id]['cantidad']+$cantidad,

                        ];
                        }else{

                                 $cart[$id] = [
                                'nombre'=> $dataProduct['nombre'],
                                'precio'=> $dataProduct['precio'],
                                'cantidad'=> $cantidad,

                        ];

                        }
                }

             Yii::$app->session['cart'] = $cart;

     
    }

         public function actionAdd2($id, $quantity)
    {
        

        // $data = new Productos();
          //      $dataProduct = $data->getInfoProductBy($id);

                 	# code...
               if (isset(Yii::$app->session['cart'])) {
                 $cart = Yii::$app->session['cart'];

                        if (array_key_exists($id,$cart)) {

                        	if ($quantity) {
                        	

                                  $cart[$id] = [
                                'nombre'=> $cart[$id]['nombre'],
                                'precio'=> $cart[$id]['precio'],
                                'cantidad'=> $quantity,

		                        ];
		                    }else{
                    	unset($cart[$id]);
                        }
                    }
                }
                

             Yii::$app->session['cart'] = $cart;
            
            return $this->renderAjax('cart',['cart'=>$cart, 'descuento' =>0, 'tipo'=>1]);

     
    }

      public function actionDescuento($tipo)
    {
          
            
                 $cart = Yii::$app->session['cart'];
                 $model = new ConsSalidas();


        
            
            return $this->renderAjax('cart',['cart'=>$cart, 'tipo'=>$tipo, 'descuento' =>$descuento = 0]);

     
    }

    public function actionCart($tipo,$descuento){
    	$cart =  Yii::$app->session['cart'];
    	return $this->render('cart', ['cart'=>$cart, 'tipo'=>$tipo, 'descuento' =>$descuento]);
    }

}
