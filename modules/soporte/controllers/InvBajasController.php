<?php

namespace app\modules\soporte\controllers;

use Yii;
use app\modules\soporte\models\InvBajas;
use app\modules\soporte\models\InvBajasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\telefonia\models\CatMarca;
use app\modules\telefonia\models\CatModelo;
use yii\db\Expression;



/**
 * InvBajasController implements the CRUD actions for InvBajas model.
 */
class InvBajasController extends Controller
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

 public function actionModelos($id)
    {
        $cuentaModelos = CatModelo::find()->where(['id_marca'=>$id])->count();
        $modelos = CatModelo::find()->where(['id_marca'=>$id])->all();

        if ($cuentaModelos > 0) {
            foreach ($modelos as $key => $value) {
                echo "<option value=". $value->id . ">". $value->modelo. "</option>";
            }
        }else{
            echo "<option>-</option>";
        }
    }

    /**
     * Lists all InvBajas models.
     * @return mixed
     */
    public function actionIndex()
    {
       // $searchModel = new InvBajasSearch();
      //  $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id_p);

        return $this->render('index', [
            //'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
        ]);
    }

       public function actionPeriodo($idp)
    {
        $searchModel = new InvBajasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$idp);

        return $this->render('periodo', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'idp' => $idp,
        ]);
    }

    /**
     * Displays a single InvBajas model.
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
     * Creates a new InvBajas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idp)
    {
        $model = new InvBajas();

        if ($model->load(Yii::$app->request->post())) {

            $model->created_by=Yii::$app->user->identity->user_id;
            $model->created_at = new Expression('NOW()');
           // $model->updated_at = new Expression('NOW()');
            $model->id_plantel=Yii::$app->user->identity->id_plantel;
            $model->id_periodo = $idp;
            $model->estado_baja = 1;
            $model->id_tipo = 1;
            $model->bloq = 0;
           // $fecha1 = $this->traerFechaInv($model->progresivo);
           // $model->clasif = 1; //$this->antiguedad($fecha1,$fecha2);
            if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
               // Yii::$app->session->setflash("error","Error: Progresivo No existe en el sistema inventarial y/o progresivo ya fue registrado ");
                 //return $this->redirect(['create']);
                //exit;
                # code...
            }
            return $this->redirect(['periodo', 'idp' => $idp]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing InvBajas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$idp)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->updated_by=Yii::$app->user->identity->user_id;
            $model->updated_at = new Expression('NOW()');

              if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
               // Yii::$app->session->setflash("error","Error: Progresivo No existe en el sistema inventarial y/o progresivo ya fue registrado ");
                 //return $this->redirect(['create']);
                //exit;
                # code...
            }
            return $this->redirect(['periodo', 'id' => $model->id,  'idp' => $idp]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing InvBajas model.
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
     * Finds the InvBajas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InvBajas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InvBajas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
