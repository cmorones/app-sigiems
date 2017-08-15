<?php

namespace app\modules\soporte\controllers;

use Yii;
use app\modules\soporte\models\BajasCertificado;
use app\modules\soporte\models\BajasCertificadoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\soporte\models\InvBajas;
use yii\db\Expression;

/**
 * BajasCertificadoController implements the CRUD actions for BajasCertificado model.
 */
class BajasCertificadoController extends Controller
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
     * Lists all BajasCertificado models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BajasCertificadoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BajasCertificado model.
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
     * Creates a new BajasCertificado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idb,$idp)
    {
        $model = new BajasCertificado();
            $model2 = InvBajas::findOne($idb);
        if ($model->load(Yii::$app->request->post()) ) {
            $model->bloq=0;
            $model->id_baja = $idb;
            $model->created_by=@Yii::$app->user->identity->user_id;
            $model->created_at=new \yii\db\Expression('NOW()');
         if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
            }
            return $this->redirect(['/soporte/inv-bajas/periodo', 'idp' => $idp]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'idb' => $idb,
                'idp' => $idp,
                'model2' => $model2,
            ]);
        }
    }

    /**
     * Updates an existing BajasCertificado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$idb,$idp)
    {
        $model = $this->findModel($id);
        $model2 = InvBajas::findOne($idb);

        if ($model->load(Yii::$app->request->post()) ) {
        $model->updated_by=@Yii::$app->user->identity->user_id;
        $model->updated_at = new Expression('NOW()');    
       if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
            }
                 return $this->redirect(['/soporte/inv-bajas/periodo', 'idp' => $idp]);
         

        } else {
            return $this->render('update', [
                'model' => $model,
                'idb' => $idb,
                 'idp' => $idp,
                'model2' => $model2,
            ]);
        }
    }

    /**
     * Deletes an existing BajasCertificado model.
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
     * Finds the BajasCertificado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BajasCertificado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BajasCertificado::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}