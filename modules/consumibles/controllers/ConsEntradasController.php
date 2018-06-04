<?php

namespace app\modules\consumibles\controllers;

use Yii;
use app\modules\consumibles\models\ConsEntradas;
use app\modules\consumibles\models\Consumibles;
use app\modules\consumibles\models\ConsEntradasSearch;
use app\modules\consumibles\models\InvConsumibles;
use app\modules\consumibles\models\InvBitacora;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\helpers\Json;

/**
 * ConsEntradasController implements the CRUD actions for ConsEntradas model.
 */
class ConsEntradasController extends Controller
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
     * Lists all ConsEntradas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConsEntradasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ConsEntradas model.
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
     * Creates a new ConsEntradas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ConsEntradas();

        if ($model->load(Yii::$app->request->post()) ) {

            $model->created_by=Yii::$app->user->identity->user_id;
            $model->created_at = new Expression('NOW()');
            $model->estado=1;
            $model->id_area =Yii::$app->user->identity->perfil;

             if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
            }

             $idproducto = InvConsumibles::find()->where(['id_consumible'=>$model->id_consumible])->count(); 

            $intprod = intval($idproducto);

            if ($intprod == 0) {
                $entrada = new InvConsumibles();
                $entrada->id_consumible = $model->id_consumible;
                $entrada->id_ubicacion = 1;
                $entrada->existencia = $model->cantidad;
                $entrada->created_by=Yii::$app->user->identity->user_id;
                $entrada->created_at = new Expression('NOW()');
                $entrada->save();

                $json = Json::encode($entrada);

            $bitacora = new InvBitacora();
            $bitacora->id_accion =1;
            $bitacora->id_tabla =1;
            $bitacora->contenido =$json;
            $bitacora->id_area =Yii::$app->user->identity->perfil;
            $bitacora->created_by=Yii::$app->user->identity->user_id;
            $bitacora->created_at = new Expression('NOW()');
            $bitacora->save();

            }elseif ($intprod > 0) {
                
                $existencia = \Yii::$app->db ->createCommand("SELECT 
          sum(inv_consumibles.existencia) as suma 
        FROM 
          inv_consumibles 
        WHERE 
          id_consumible=$model->id_consumible")->queryOne();

                $addsum = intval($existencia['suma']);
                
                $table = InvConsumibles::find()->where(['id_consumible'=>$model->id_consumible])->one();
                $table->existencia = $addsum + $model->cantidad;
                $table->save();

        $total = $addsum + $model->cantidad;
              $data = [
                   'existencia_anterior' => $addsum,
                   'existencia_nueva' => $total,
                ];

             $json3 = Json::encode($data);

            $bitacora2 = new InvBitacora();
            $bitacora2->id_accion =3;
            $bitacora2->id_tabla =1;
            $bitacora2->contenido =$json3;
            $bitacora2->id_area =Yii::$app->user->identity->perfil;
            $bitacora2->created_by=Yii::$app->user->identity->user_id;
            $bitacora2->created_at = new Expression('NOW()');
            $bitacora2->save();
                         
                
            }


            $json2 = Json::encode($model);

            $bitacora1 = new InvBitacora();
            $bitacora1->id_accion =1;
            $bitacora1->id_tabla =3;
            $bitacora1->contenido =$json2;
            $bitacora1->id_area =Yii::$app->user->identity->perfil;
            $bitacora1->created_by=Yii::$app->user->identity->user_id;
            $bitacora1->created_at = new Expression('NOW()');
            $bitacora1->save();

            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ConsEntradas model.
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
     * Deletes an existing ConsEntradas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ConsEntradas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ConsEntradas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ConsEntradas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
