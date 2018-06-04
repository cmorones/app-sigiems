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
              if(Yii::$app->user->can('modTelecom') ) {
            ?> 

               <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="menu-box">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-graduation-cap"></i> Inventario IEMS</a>
                        </li>
                       
                      

                        
                       

                        <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Equipos en RED',['/soporte/inv-equipos/index']) ?>
                        </li>

                       <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario CAMBS telecom',['/soporte/inv-equipos-telecom/index']) ?>
                        </li>

                         <li>
                            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Revision de  Equipos Telecom',['/petic/default/revtelecom'])?>
                        </li>


                    



                    </ul>
                </div>
            </div>

            <?php
          }
          ?>


                 <?php  
              if(Yii::$app->user->can('menuSoporte')) {
            ?> 

             <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="menu-box">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-graduation-cap"></i> Revision de Equipos</a>
                        </li>
                         <?php  
                        if(Yii::$app->user->can('mesaAyuda')) {
                         ?>
                        
                                               
                        <li>
                            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Revision de  Equipos IEMS',['/petic/default/revplantel'])?>
                        </li>

                      
                       

                    </ul>
                </div>
            </div>

                <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="menu-box">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-graduation-cap"></i> Inventario IEMS</a>
                        </li>
                         <?php  
                        if(Yii::$app->user->can('mesaAyuda')) {
                         ?>
                        
                        <?php
                       
                        if(Yii::$app->user->can('/soporte/inv-equipos/index')) {
                        ?>

                        
                        <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Servidores',['/soporte/inv-servers/index']) ?>
                        </li>

                        <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Equipos',['/soporte/inv-equipos/index']) ?>
                        </li>

                    

                        <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de No-breaks',['/soporte/inv-nobreak/index']) ?>
                        </li>

                       

                         <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Impresoras',['/soporte/inv-impresoras/index']) ?>
                        </li>

                      

                        <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Bajas',['/soporte/inv-bajas/index']) ?>
                        </li>

                          <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Validacion de Bajas vs Almacen',['/soporte/inv-bajas/validacion']) ?>
                        </li>

                          <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Baterias de Desecho',['/soporte/inv-baterias/index']) ?>
                        </li>

                         <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Desechos',['/soporte/inv-desechos/index']) ?>
                        </li>

                          <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i>Prestamo de Equipos',['/soporte/solicitud-presta/index']) ?>
                        </li>
                         <?php
                            }



                        }
                         
                        ?>


                    </ul>
                </div>
            </div>

               <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="menu-box">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-graduation-cap"></i> Inventario Externo</a>
                        </li>
                         <?php  
                        if(Yii::$app->user->can('mesaAyuda')) {
                         ?>
                        
                        <?php
                       
                        if(Yii::$app->user->can('/soporte/inv-equipos/index')) {
                        ?>

                  
                         <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Equipos Externos',['/soporte/inv-equipos-ex/index']) ?>
                        </li>


                            <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de No-breaks Externos',['/soporte/inv-nobreak-ex/index']) ?>
                        </li>

                     
                         <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Impresoras Externos',['/soporte/inv-impresoras-ex/index']) ?>
                        </li>

                          <li>
                            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Relacion de Equipos en Sedes Alternas',['/soporte/inv-alterno'])?>
                        </li>

                          <li>
                            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Relacion de Equipos faltantes en sistema',['/soporte/inv-equipos/revision'])?>
                        </li>


                          <?php
                            }



                        }
                         
                        ?>


                    </ul>
                </div>
            </div>

                   <!-- Menu Soporte Técnico --> 
             <?php  
              if(Yii::$app->user->can('menuReportes')) {
            ?>                                    
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="menu-box">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-graduation-cap"></i> Reportes</a>
                        </li>

                       <?php 
                    //  if(Yii::$app->user->can('informeEquipos')) {
                        ?>

                        <li>

                           <?= Html::a('<i class="fa fa-file-pdf-o"></i> Informe Equipos IEMS-PDF',['/soporte/inf-pdf/'],['id' => 'export-pdf', 'target' => 'blank']) ?>
              
                        </li>
                        <li>

                           <?= Html::a('<i class="fa fa-file-pdf-o"></i> Informe Equipos Externos-PDF',['/soporte/inf-pdf/index2'],['id' => 'export-pdf', 'target' => 'blank']) ?>
              
                        </li>
                        <?php
                   // }

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

              <?php
                          



                        }
                         
                        ?>





                </div>
             