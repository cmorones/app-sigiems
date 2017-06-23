<?php

namespace app\modules\soporte\controllers;

use Yii;
use app\modules\soporte\models\InvDesechos;
use app\modules\soporte\models\MarcaDesecho;
use app\modules\soporte\models\ModeloDesecho;
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
        $cuentaModelos = ModeloDesecho::find()->where(['id_marca'=>$id])->count();
        $modelos = ModeloDesecho::find()->where(['id_marca'=>$id])->all();

        if ($cuentaModelos > 0) {
            foreach ($modelos as $key => $value) {
                echo "<option value=". $value->id . ">". $value->nombre. "</option>";
            }
        }else{
            echo "<option>-</option>";
        }
    }

         public function actionMarcas($id)
    {
        $cuentaModelos = MarcaDesecho::find()->where(['tipo'=>$id])->count();
        $modelos = MarcaDesecho::find()->where(['tipo'=>$id])->all();

         echo "<option>Selecciona Marca</option>";

        if ($cuentaModelos > 0) {

            foreach ($modelos as $key => $value) {
                echo "<option value=". $value->id . ">". $value->nombre. "</option>";
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

    public function actionSubcat() {
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $cat_id = $parents[0];
            $out = self::getSubCatList($cat_id); 
            // the getSubCatList function will query the database based on the
            // cat_id and return an array like below:
            // [
            //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
            //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
            // ]
            echo Json::encode(['output'=>$out, 'selected'=>'']);
            return;
        }
    }
    echo Json::encode(['output'=>'', 'selected'=>'']);
}

public function getSubCatList($cat_id){

    $modelos = CatMarca::find()->where(['id'=>$cat_id])->all();

    return $modelos;

}
}
