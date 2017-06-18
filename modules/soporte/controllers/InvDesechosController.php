<?php

namespace app\modules\soporte\controllers;

use Yii;
use app\modules\soporte\models\InvDesechos;
use app\modules\soporte\models\InvDesechosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InvDesechosController implements the CRUD actions for InvDesechos model.
 */
class InvDesechosController extends Controller
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
     * Lists all InvDesechos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InvDesechosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionPeriodo($idp)
    {
        $searchModel = new InvDesechosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$idp);

        return $this->render('periodo', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'idp' => $idp,
        ]);
    }

    /**
     * Displays a single InvDesechos model.
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
     * Creates a new InvDesechos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InvDesechos();

                if ($model->load(Yii::$app->request->post())){
            $model->created_at=new \yii\db\Expression('NOW()');
            $model->created_by=@Yii::$app->user->identity->user_id;

         $model->save() ;
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing InvDesechos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->updated_at=new \yii\db\Expression('NOW()');
            $model->updated_by=@Yii::$app->user->identity->user_id;
         $model->save();
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
          public function actionModelos($id)
    {
        $cuentaModelos = CatModelo::find()->where(['id'=>$id])->count();
        $modelos = CatModelo::find()->where(['id'=>$id])->all();

        if ($cuentaModelos > 0) {
            foreach ($modelos as $key => $value) {
                echo "<option value=". $value->id . ">". $value->modelo. "</option>";
            }
        }else{
            echo "<option>-</option>";
        }
    }

    /**
     * Deletes an existing InvDesechos model.
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
     * Finds the InvDesechos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InvDesechos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InvDesechos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
