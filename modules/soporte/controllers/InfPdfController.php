<?php

namespace app\modules\soporte\controllers;

use app\modules\soporte\models\BajasDictamen;
use yii\web\Controller;
use Yii;
use app\modules\soporte\models\InvBajas;




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

    

    public function actionIndex2()
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/index2',
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

      public function actionMovs($id)
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/movs',
			[
				'id'=>$id,
				
			]);

       // $html = "Hola Mundo";
        $fName = "Movimiento_".date('Ymd_His');
		return Yii::$app->pdf->exportData('Informe',$fName,$html);
    }

      public function actionAsign($id)
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/asign',
			[
				'id'=>$id,
				
			]);

       // $html = "Hola Mundo";
        $fName = "Asignacion_".date('Ymd_His');
		return Yii::$app->pdf->exportData('Informe',$fName,$html);
    }
    
    
    
    public function actionTelefon()
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/telefon',
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

      public function actionTempo($id)
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/tempo',
			[
				'id'=>$id,
				/*'empDocs'=>$empDocs,
				'empMaster'=>$empMaster,
				'empInfo'=>$empInfo,
				'nationality'=>$nationality,
				'empAdd'=>$empAdd,*/
			]);

       // $html = "Hola Mundo";
        $fName = "DIT_".date('Ymd_His');
		return Yii::$app->pdf->exportData('InformeTemporal',$fName,$html);
    }

    public function actionTelgen()
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/telgen',
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

    public function actionIndex4($idb)
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/index4',
			[
			'idb' => $idb,
				/*'empDocs'=>$empDocs,
				'empMaster'=>$empMaster,
				'empInfo'=>$empInfo,
				'nationality'=>$nationality,
				'empAdd'=>$empAdd,*/
			]);

       // $html = "Hola Mundo";
        $fName = "Dictamen-".$idb. "_".date('Ymd_His');
		return Yii::$app->pdf->exportData('Informe',$fName,$html);
    }

    public function actionIndex5($idb)
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/index5',
			[
			'idb' => $idb,
				/*'empDocs'=>$empDocs,
				'empMaster'=>$empMaster,
				'empInfo'=>$empInfo,
				'nationality'=>$nationality,
				'empAdd'=>$empAdd,*/
			]);

       // $html = "Hola Mundo";
        $fName = "Certificado-".$idb. "_".date('Ymd_His');
		return Yii::$app->pdf->exportData('Informe',$fName,$html);
    }

    public function actionIndex6($idp)
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/index6',
			[
				'idp'=>$idp,
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

    public function actionIndex3($idb)
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/index4',
			[
			'idb' => $idb,
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
    public function actionRpt()
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/rpt',
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


    public function actionBaterias($idp)
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/baterias',
			[
				'idp'=>$idp,
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

    public function actionBateriast($idp)
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/bateriast',
			[
				'idp'=>$idp,
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

public function actionDesechos($idp)
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/desechos',
			[
				'idp'=>$idp,
				/*'empDocs'=>$empDocs,
				'empMaster'=>$empMaster,
				'empInfo'=>$empInfo,
				'nationality'=>$nationality,
				'empAdd'=>$empAdd,*/
			]);

       // $html = "Hola Mundo";
        $fName = "Cesar Morones_".date('Ymd_His');
		return Yii::$app->pdf->exportData2('Informe',$fName,$html);
    }

    public function actionDesechost($idp)
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/desechost',
			[
				'idp'=>$idp,
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
