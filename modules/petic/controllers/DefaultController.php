<?php

namespace app\modules\petic\controllers;

use yii\web\Controller;

/**
 * Default controller for the `petic` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

      public function actionRevision()
    {
        return $this->render('_revision');
    }
}
