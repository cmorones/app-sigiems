<?php

namespace app\modules\soporte\controllers;

use Yii;
use app\modules\soporte\models\InvAsignaciones;
use app\modules\soporte\models\InvAsignacionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;

/**
 * InvAsignacionesController implements the CRUD actions for InvAsignaciones model.
 */
class InvAsignacionesController extends Controller
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
     * Lists all InvAsignaciones models.
     * @return mixed
     */

      public function actionList()
    {
       
        return $this->render('_list');
    }

 

     public function actionIndex($idp)
    {
        $searchModel = new InvAsignacionesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$idp);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'idp' => $idp
        ]);
    }

    /**
     * Displays a single InvAsignaciones model.
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
     * Creates a new InvAsignaciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idp)
    {
        $model = new InvAsignaciones();

        if ($model->load(Yii::$app->request->post())) {

           



            $model->created_by=Yii::$app->user->identity->user_id;
            $model->id_plantel=Yii::$app->user->identity->id_plantel;
            $model->created_at = new Expression('NOW()');

            $dato = explode("-", $model->fecha);  

            
            $model->id_mes =  $dato[1];
            $model->folio = $this->ultimofolio(Yii::$app->user->identity->id_plantel,Yii::$app->user->identity->id_area);
          
            $model->estado = 1;
            $model->id_periodo = $idp;
              if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
                Yii::$app->session->setflash("error","Error: Progresivo No existe en el sistema inventarial y/o progresivo ya fue registrado ");
                 return $this->redirect(['create']);
                //exit;
                # code...
            }
            return $this->redirect(['index', 'idp' => $idp]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing InvAsignaciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $dato = explode("-", $model->fecha);  

            if($dato[2] == '2018'){
                $model->id_periodo = 4;
            }

            $model->updated_by=Yii::$app->user->identity->user_id;
            $model->updated_at = new Expression('NOW()');
            

            $model->save();
            return $this->redirect(['index', 'idp' => $model->id_periodo]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing InvAsignaciones model.
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
     * Finds the InvAsignaciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InvAsignaciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InvAsignaciones::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

      public function ultimoFolio($id_plantel,$id_area){

            $folio = \Yii::$app->db->createCommand("SELECT max(inv_asignaciones.id) as lastfolio
            FROM inv_asignaciones   WHERE id_plantel=$id_plantel and id_area=$id_area and estado=1")->queryOne();

            if ($folio['lastfolio'] !=0 ){
                return $folio['lastfolio']+1;
            }else{
                return 0+1;
            }
    }

}
