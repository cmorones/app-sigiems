<?php

namespace app\modules\soporte\controllers;

use Yii;
use app\modules\soporte\models\AsignDetalle;
use app\modules\soporte\models\AsignDetalleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;

/**
 * AsignDetalleController implements the CRUD actions for AsignDetalle model.
 */
class AsignDetalleController extends Controller
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
                    'delete' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all AsignDetalle models.
     * @return mixed
     */
    public function actionIndex($id,$idp)
    {
        $searchModel = new AsignDetalleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id,$idp);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id'=>$id,
            'idp'=>$idp
        ]);
    }

    /**
     * Displays a single AsignDetalle model.
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
     * Creates a new AsignDetalle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id,$idp)
    {
        $model = new AsignDetalle();

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
            return $this->redirect(['index', 'id' => $id, 'idp'=>$idp]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'id' => $id,
                'idp' => $idp,
            ]);
        }
    }

    /**
     * Updates an existing AsignDetalle model.
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
            return $this->redirect(['index', 'id' => $model->id_mov, 'idp'=>$idp]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'id' => $id,
                'idp' => $idp,
            ]);
        }
    }

    /**
     * Deletes an existing AsignDetalle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id,$idp)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index', 'id' => $id, 'idp'=>$idp]);
    }

    /**
     * Finds the AsignDetalle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AsignDetalle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AsignDetalle::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
