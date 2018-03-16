<?php

namespace app\modules\consumibles\controllers;

use Yii;
use app\modules\consumibles\models\ConsDetalle;
use app\modules\consumibles\models\ConsDetalleSearch;
use app\modules\consumibles\models\InvBitacora;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\db\Expression;
/**
 * ConsDetalleController implements the CRUD actions for ConsDetalle model. InvBitacora
 */
class ConsDetalleController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ConsDetalle models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConsDetalleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ConsDetalle model.
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
     * Creates a new ConsDetalle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new ConsDetalle();

          if ($model->load(Yii::$app->request->post())) {
            $model->id_salida = $id;
            $model->estado = 1;
            $model->created_by=Yii::$app->user->identity->user_id;
            $model->created_at = new Expression('NOW()');
            $model->save();

                $json = Json::encode($model);

              $bitacora1 = new InvBitacora();
                $bitacora1->id_accion =1;
                $bitacora1->id_tabla =2;
                $bitacora1->contenido =$json;
                $bitacora1->id_area =Yii::$app->user->identity->perfil;
                $bitacora1->created_by=Yii::$app->user->identity->user_id;
                $bitacora1->created_at = new Expression('NOW()');
                $bitacora1->save();

           
             $this->calculaexistencia($model->id_cons,$model->cantidad);

            return $this->redirect(['cons-salidas/items', 'id' => $id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
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

    /**
     * Updates an existing ConsDetalle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ConsDetalle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

     public function actionBorrar($id,$id_salida,$cantidad)
    {
       // $eliminacion = $this->findModel($id);
        $model2 = $this->findModel($id);
        $this->findModel($id)->delete();

        $existencia = \Yii::$app->db ->createCommand("SELECT 
        existencia
        FROM 
          inv_consumibles 
        WHERE 
          id_consumible=$model2->id_cons")->queryOne();

                $result = intval($existencia['existencia']);
      
    $total  = $result + $cantidad;
    $sql="Update inv_consumibles set existencia =". $total . " where id_consumible =".$model2->id_cons. "";
    
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

    $json2 = Json::encode($model2);

    $bitacora1 = new InvBitacora();
    $bitacora1->id_accion =2;
    $bitacora1->id_tabla =2;
    $bitacora1->contenido =$json2;
    $bitacora1->id_area =Yii::$app->user->identity->perfil;
    $bitacora1->created_by=Yii::$app->user->identity->user_id;
    $bitacora1->created_at = new Expression('NOW()');
    $bitacora1->save();


        return $this->redirect(['cons-salidas/items', 'id'=>$id_salida]);
    }


    /**
     * Finds the ConsDetalle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ConsDetalle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ConsDetalle::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
