<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Users;
use app\modules\admin\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
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
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
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
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->id_profesor=1; 
            $model->created_at=new \yii\db\Expression('NOW()');
            $model->created_by=@Yii::$app->user->identity->user_id;
            $model->is_block=1;
            $model->user_password=md5($model->user_password.$model->user_password);
            $model->save();

            return $this->redirect(['index', 'id' => $model->user_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            $model->id_profesor=1; 
            $model->updated_at=new \yii\db\Expression('NOW()');
            $model->updated_by=@Yii::$app->user->identity->user_id;
            $model->is_block=1;
            
            if($model->activa){
            $model->user_password=md5($model->user_password.$model->user_password);
            }
            $model->save();
            return $this->redirect(['index', 'id' => $model->user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */

public function actionCambiar($id)
    {
        $model = $this->findModel($id);
        //$model->scenario='cambiar';

        if ($model->load(Yii::$app->request->post()) ) {
            $model->id_profesor=1; 
            $model->updated_at=new \yii\db\Expression('NOW()');
            $model->updated_by=@Yii::$app->user->identity->user_id;
            $model->is_block=1;

            $model->user_password=md5($model->user_password.$model->user_password);
         
            $model->save();
            return $this->redirect(['index', 'id' => $model->user_id]);
        } else {
            return $this->render('cambiar', [
                'model' => $model,
            ]);
        }
    }

    
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
