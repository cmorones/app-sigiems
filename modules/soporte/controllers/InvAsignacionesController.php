<?php

namespace app\modules\soporte\controllers;

use Yii;
use app\modules\soporte\models\InvAsignaciones;
use app\modules\soporte\models\InvAsignacionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\web\UploadedFile;

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
            $model->folio = $this->ultimofolio(Yii::$app->user->identity->id_plantel);
          
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


        public function actionDocto($id,$idp)
    {
        $model = $this->findModel($id);
        $model->scenario = 'updoc';

       
        $model2 = InvAsignaciones::findOne($id);

        if ($model->load(Yii::$app->request->post()) ) {
        
        $model->file = UploadedFile::getInstance($model,'file');
        $model->file->saveAs('asignaciones/'.$model->file->baseName.'-'.date('Y-m-d h:m:s').'.'.$model->file->extension);
       //  $model->file->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
        $model->docto = $model->file->baseName.'-'.date('Y-m-d h:m:s').'.'.$model->file->extension;
       //  $model->docto=1;
         $model->estado=2;
        $model->updated_by=@Yii::$app->user->identity->user_id;
        $model->updated_at = new Expression('NOW()');    
       if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
            }
             return $this->redirect(['index', 'idp' => $idp]);
         

        } else {
            return $this->render('docto', [
                'model' => $model,
                'model2' => $model2,

            ]);
        }
    }

      public function actionPdf($id) {
    $model = $this->findModel($id);

    // This will need to be the path relative to the root of your app.
    $filePath = '/asignaciones';
    // Might need to change '@app' for another alias
    $completePath = Yii::getAlias('@webroot'.$filePath.'/'.$model->docto);
    return Yii::$app->response->sendFile($completePath, $model->docto);
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
            $model->id_mes =  $dato[1];

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

      public function ultimoFolio($id_plantel){

            $folio = \Yii::$app->db->createCommand("SELECT max(inv_asignaciones.id) as lastfolio
            FROM inv_asignaciones   WHERE id_plantel=$id_plantel  and estado=1")->queryOne();

            if ($folio['lastfolio'] !=0 ){
                return $folio['lastfolio']+1;
            }else{
                return 0+1;
            }
    }

}
