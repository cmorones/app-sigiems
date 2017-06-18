<?php

namespace app\modules\soporte\controllers;
use yii\web\Controller;
use Yii;

class InfPdfController extends \yii\web\Controller
{
    public function actionIndex()
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/index',
			[
				/*'empDocs'=>$empDocs,
				'empMaster'=>$empMaster,
				'empInfo'=>$empInfo,
				'nationality'=>$nationality,
				'empAdd'=>$empAdd,*/
			]);

       // $html = "Hola Mundo";
        $fName = "Cesar Morones_".date('Ymd_His');
		return Yii::$app->pdf->exportData('Informe',$fName,$html);
    }



}
