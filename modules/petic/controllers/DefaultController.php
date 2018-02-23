<?php

namespace app\modules\petic\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
/**
 * Default controller for the `petic` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */

     public function behaviors()
    {
        return [
        
               'access' => [
                'class' => AccessControl::className(),
               // 'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['index','revision','revplantel','equipos','equipos2', 'impresoras','laptop', 'scanners', 'servidores', 'nobreaks'],
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


    public function actionIndex()
    {
        return $this->render('index');
    }

      public function actionRevision()
    {
        return $this->render('_revision');
    }

     public function actionRevplantel()
    {
        return $this->render('_revisionplantel');
    }

     public function actionEquipos()
    {
        return $this->render('_equipos');
    }

     public function actionEquipos2()
    {
        return $this->render('_equipos2');
    }


      public function actionImpresoras()
    {
        return $this->render('_impresoras');
    }

    public function actionLaptop()
    {
        return $this->render('_laptop');
    }

    public function actionScanners()
    {
        return $this->render('_scanner');
    }


    public function actionServidores()
    {
        return $this->render('_servidores');
    }

    public function actionNobreaks()
    {
        return $this->render('_nobreaks');
    }


}
