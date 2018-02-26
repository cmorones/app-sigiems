<?php

namespace app\modules\soporte\controllers;

use Yii;
use app\modules\soporte\models\CatAreas;
use app\modules\soporte\models\MovBienes;
use app\modules\soporte\models\MovBienesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\db\Expression;

/**
 * MovBienesController implements the CRUD actions for MovBienes model.
 */
class MovBienesController extends Controller
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
     * Lists all MovBienes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MovBienesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MovBienes model.
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
     * Creates a new MovBienes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MovBienes();

        if ($model->load(Yii::$app->request->post())) {

            $model->created_by=Yii::$app->user->identity->user_id;
            $model->created_at = $fecha = date("Y-m-d");//new Expression('NOW()');
            $model->id_plantel=Yii::$app->user->identity->id_plantel;
            $model->estado=1;
            $model->folio = $this->ultimoFolio(Yii::$app->user->identity->id_plantel);
            $model->sfolio = "MBI-".$this->ultimoFolio(Yii::$app->user->identity->id_plantel)."-2018";
            if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
              
            }

            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MovBienes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
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

    /**
     * Deletes an existing MovBienes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

     public function actionDocto($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'updoc';

       
   //     $model2 = InvBajas::findOne($idb);

        if ($model->load(Yii::$app->request->post()) ) {
        
        $model->file = UploadedFile::getInstance($model,'file');
        $model->file->saveAs('movimientos/'.$model->file->baseName.'-'.date('Y-m-d h:m:s').'.'.$model->file->extension);
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
            return $this->redirect(['/soporte/mov-bienes/index']);
         

        } else {
            return $this->render('docto', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the MovBienes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MovBienes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MovBienes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function ultimoFolio($id_plantel){

            $folio = \Yii::$app->db->createCommand("SELECT max(mov_bienes.id) as lastfolio
            FROM MOV_BIENES   WHERE id_plantel=$id_plantel and estado=1")->queryOne();

            if ($folio['lastfolio'] !=0 ){
                return $folio['lastfolio']+1;
            }else{
                return 0+1;
            }
    }

     public function actionPdf($id) {
    $model = $this->findModel($id);

    // This will need to be the path relative to the root of your app.
    $filePath = '/movimientos';
    // Might need to change '@app' for another alias
    $completePath = Yii::getAlias('@webroot'.$filePath.'/'.$model->documento);

    return Yii::$app->response->sendFile($completePath, $model->documento);
}

}
