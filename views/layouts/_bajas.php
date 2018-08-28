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




                 <?php  
              if(Yii::$app->user->can('menuSoporte')) {
            ?> 

             <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="menu-box">
                    <ul>
                        
                         <?php  
                        if(Yii::$app->user->can('mesaAyuda')) {
                         ?>
                        
                                               
                     
                      
                       

                    </ul>
                </div>
            </div>

                <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="menu-box">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-graduation-cap"></i> Proceso Bajas IEMS</a>
                        </li>
                         <?php  
                        if(Yii::$app->user->can('mesaAyuda')) {
                         ?>
                        
                        <?php
                       
                        if(Yii::$app->user->can('/soporte/inv-equipos/index')) {
                        ?>

                        
                    
                      

                        <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Bajas',['/soporte/inv-bajas/index']) ?>
                        </li>

                         

                         
                         <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Desechos',['/soporte/inv-desechos/index']) ?>
                        </li>

                         
                         <?php
                            }



                        }
                         
                        ?>


                    </ul>
                </div>
            </div>

              


            <?php

            }

            ?>

              <?php
                          



                        }
                         
                        ?>





                </div>
             