<?php

namespace app\modules\consumibles\controllers;

use Yii;
use app\modules\soporte\models\CatAreas;
use app\modules\consumibles\models\ConsSalidas;
use app\modules\consumibles\models\ConsDetalle;
use app\modules\consumibles\models\ConsSalidasSearch;
use app\modules\consumibles\models\InvConsumibles;
use app\modules\consumibles\models\Consumibles;
use app\modules\consumibles\models\InvBitacora;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\web\UploadedFile;
use yii\helpers\Json;


/**
 * ConsSalidasController implements the CRUD actions for ConsSalidas model.
 */
class ConsSalidasController extends Controller
{
    /**
     * @inheritdoc
     */
        public function behaviors()
    {
        return [
               'access' => [
                'class' => AccessControl::className(),
               // 'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['index','create','view','update','docto','pdf'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    /**
     * Lists all ConsSalidas models.
     * @return mixed
     */
    public function actionSalidas()
    {
        $searchModel = new ConsSalidasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);




        return $this->render('salidas', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex()
    {
        
       $data = InvConsumibles::find()->joinWith('datos')->where(['>', 'existencia', 0])->orderBy(['consumibles.nombre' => SORT_ASC])->all();
     //  $data2 = InvProductos::find()->->with('productos')->where(['>', 'existencia', 0])->andWhere(['productos.id_categoria'=>1])->all();

      


        return $this->render('index', [
            'data' => $data,
         
            ]);
    }

    /**
     * Displays a single ConsSalidas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ConsSalidas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatex()
    {
        $model = new ConsSalidas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

        public function actionCreate($total)
    {
        $model = new ConsSalidas();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_by=Yii::$app->user->identity->user_id;
            $model->created_at = new Expression('NOW()');
           //  $model->fecha_reg = new Expression('NOW()');

            if (Yii::$app->user->identity->perfil==3) {
                # code...
                $area = "ST";
            }elseif (Yii::$app->user->identity->perfil==4) {
                $area = "TELECOM";
            }
            $model->estado=1;
            $model->total=$total;
            $model->id_plantel_origen=Yii::$app->user->identity->id_plantel;
            $model->id_area_origen = Yii::$app->user->identity->perfil;
            $model->folio = $this->ultimoFolio(Yii::$app->user->identity->id_plantel,$model->id_area_origen);
            $model->sfolio = "MRI-".$area."-".$this->ultimoFolio(Yii::$app->user->identity->id_plantel,$model->id_area_origen)."-2018";
             if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
            }
            $orden_id = $model->id;
            $cart = Yii::$app->session['cart'];
            foreach ($cart as $key => $value) {
                $ordenDetalle = new ConsDetalle();
                $ordenDetalle->id_salida = $orden_id;
                $ordenDetalle->id_cons = $key;
                $ordenDetalle->cantidad = $value['cantidad'];
                $ordenDetalle->estado = 1;
                $ordenDetalle->created_by=Yii::$app->user->identity->user_id;
                $ordenDetalle->created_at = new Expression('NOW()');
                $ordenDetalle->save();
                $cantidad = intval($value['cantidad']);
            }

             $this->calculaexistencia($key,$cantidad );



              /*  $idproducto = InvProductos::find()->where(['id_producto'=>$key])->count(); 

                 $intprod = intval($idproducto);

            if ($intprod > 0) {
                
                $existencia = \Yii::$app->db ->createCommand("SELECT 
        existencia
        FROM 
          inv_productos 
        WHERE 
          id_producto=1")->queryOne();

                $result = intval($existencia['existencia']);
                
                 $table = InvProductos::findOne(1);
                 $table->existencia = $result - $value['cantidad'];
                 $table->save();
                         
                
            }+*/


       //     }*/
            


           // Yii::$app->session['cart'];
            unset(Yii::$app->session['cart']);
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'total'=>$total,
               
            ]);
        }
    }

       public function actionDocto($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'updoc';

       
   //     $model2 = InvBajas::findOne($idb);

        if ($model->load(Yii::$app->request->post()) ) {
        
        $model->file = UploadedFile::getInstance($model,'file');
        $model->file->saveAs('refacciones_doctos/'.$model->file->baseName.'-'.date('Y-m-d h:m:s').'.'.$model->file->extension);
       //  $model->file->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
        $model->docto = $model->file->baseName.'-'.date('Y-m-d h:m:s').'.'.$model->file->extension;
        $model->estado=2;
        $model->updated_by=@Yii::$app->user->identity->user_id;
        $model->updated_at = new Expression('NOW()');    
       if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
            }
            return $this->redirect(['/consumibles/cons-salidas/salidas']);
         

        } else {
            return $this->render('docto', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing ConsSalidas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['salidas', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ConsSalidas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['salidas']);
    }

    /**
     * Finds the ConsSalidas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ConsSalidas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ConsSalidas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

     public function actionMostrar($articulo){
    
    return $this->render('_mostrar', [
            'articulo' => $articulo,
          
            ]);
    }

       public function actionAreas($id)
    {
        $cuentaModelos = CatAreas::find()->where(['id_plantel'=>$id])->count();
        $modelos = CatAreas::find()->where(['id_plantel'=>$id])->all();

        if ($cuentaModelos > 0) {
            foreach ($modelos as $key => $value) {
                echo "<option value=". $value->id_area . ">". $value->nombre. "</option>";
            }
        }else{
            echo "<option>-</option>";
        }
    }

      public function ultimoFolio($id_plantel, $area_origen){

            $folio = \Yii::$app->db->createCommand("SELECT max(cons_salidas.folio) as lastfolio
            FROM cons_salidas   WHERE id_plantel_origen=$id_plantel and id_area_origen = $area_origen and estado=1")->queryOne();

            if ($folio['lastfolio'] !=0 ){
                return $folio['lastfolio']+1;
            }else{
                return 0+1;
            }
    }

    function calculaexistencia($id_consumible, $cantidad){

  
                
                $existencia = \Yii::$app->db ->createCommand("SELECT 
        existencia
        FROM 
          inv_consumibles 
        WHERE 
          id_consumible=$id_consumible")->queryOne();

                $result = intval($existencia['existencia']);
      
    $total  = $result - $cantidad;
    $sql="Update inv_consumibles set existencia =". $total . " where id_consumible =".$id_consumible. "";
    
    \Yii::$app->db->createCommand($sql)->execute();


    $data = [
       'existencia_anterior' => $result,
       'existencia_nueva' => $total,
    ];

    $json = Json::encode($data);

    $bitacora = new InvBitacora();
    $bitacora->id_accion =3;
    $bitacora->id_tabla =1;
    $bitacora->contenido =$json;
    $bitacora->id_area =Yii::$app->user->identity->perfil;
    $bitacora->created_by=Yii::$app->user->identity->user_id;
    $bitacora->created_at = new Expression('NOW()');
    $bitacora->save();

}


  public function actionItems($id){
    
    return $this->render('_items', [
            'id' => $id,
          
            ]);
    }



     public function actionPdf($id) {
    $model = $this->findModel($id);

    // This will need to be the path relative to the root of your app.
    $filePath = '/refacciones_doctos';
    // Might need to change '@app' for another alias
    $completePath = Yii::getAlias('@webroot'.$filePath.'/'.$model->docto);

    return Yii::$app->response->sendFile($completePath, $model->docto);
}
}
