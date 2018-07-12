<?php
use \app\assets_b\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\web\NotFoundHttpException;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

Yii::$app->name = "APP-SIGIEMS";


?>
                <div class="row">


           
               <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="menu-box">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-graduation-cap"></i> Inventario IEMS</a>
                        </li>
                       
                      

                        
                       

                        <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Listado de Asignaciones',['/soporte/inv-asignaciones/list']) ?>
                        </li>

                       <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Informe de Asignaciones',['/soporte/inv-equipos-telecom/index']) ?>
                        </li>

                       

                    



                    </ul>
                </div>
            </div>

         




                </div>
             