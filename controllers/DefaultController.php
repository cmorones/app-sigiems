<?php

namespace app\controllers;

class DefaultController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

     public function actionDefaultpdf()
    {
        return $this->render('informepdf');
    }

}
