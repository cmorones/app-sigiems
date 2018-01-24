<?php

namespace app\modules\soporte\controllers;

use Yii;
use app\modules\soporte\models\MovDetalle;
use app\modules\soporte\models\MovDetalleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Expression;

/**
 * MovDetalleController implements the CRUD actions for MovDetalle model.
 */
class MovDetalleController extends Controller
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
                        'actions' => ['index','create','view','update'],
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
     * Lists all MovDetalle models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new MovDetalleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
        ]);
    }

    /**
     * Displays a single MovDetalle model.
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
     * Creates a new MovDetalle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new MovDetalle();

        if ($model->load(Yii::$app->request->post())) {

            $model->created_by=Yii::$app->user->identity->user_id;
            $model->created_at = $fecha = date("Y-m-d");//new Expression('NOW()');
           // $model->id_plantel=Yii::$app->user->identity->id_plantel;
            $model->estado=1;
             $model->id_mov=$id;
         if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
              
            }
            return $this->redirect(['index', 'id' => $id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'id' => $id,
            ]);
        }
    }

    /**
     * Updates an existing MovDetalle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$idp)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {


             $model->updated_by=Yii::$app->user->identity->user_id;
            $model->updated_at = new Expression('NOW()');
            if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
                # code...
            }
            return $this->redirect(['index', 'id' => $id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'idp' => $idp,
            ]);
        }
    }

    /**
     * Deletes an existing MovDetalle model.
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
     * Finds the MovDetalle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MovDetalle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MovDetalle::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
