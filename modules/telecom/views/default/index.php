<?php

use app\modules\soporte\models\InvTelecom;
?>
<br>
<br>
<br>
<br>
 <div class="panel-heading">
                                <h3 class="panel-title">Configuracionde IPs IEMS</h3>
                            </div>
<div class="col-xs-12" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
     <div class="panel-heading">
                                <h3 class="panel-title">Direccion General</h3>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Progresivo</th>
                                                    <th>IP</th>
                                                    <th>MAC</th>
                                                    <th>Plantel</th>
                                                    <th>Area</th>
                                                    <th>Usuario</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php

  $resultado =  InvTelecom::find()
                ->joinWith('progresivo')
                ->where(['inv_telecom.id_plantel'=>23])
                ->andWhere(['inv_equipos.id_area'=>1])
                ->all();
$i = 1;
foreach ($resultado as $key => $value) {
               
?>


                                                <tr class="active">
                                                    <td><?=$i?></td>
                                                    <td><?=$value->id_equipo?></td>
                                                    <td><?=$value->ip?></td>
                                                    <td><?=$value->mac?></td>
                                                     <td><?=$value->progresivo->catPlanteles->nombre?></td>
                                                    <td><?=$value->progresivo->catAreas->nombre?></td>
                                                    <td><?=$value->progresivo->usuario?></td>
                                                </tr>

    <?php
 $i++;

 // $value->progresivo->id_area
    // echo "<option value=". $value->id . ">". $value->modelo. "</option>";
            }
    ?>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

      
</div>
</div>
</div>

<!-- Direccion Administrativa -->

  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
     <div class="panel-heading">
                                <h3 class="panel-title">Direccion Administrativa</h3>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Progresivo</th>
                                                    <th>IP</th>
                                                    <th>MAC</th>
                                                    <th>Plantel</th>
                                                    <th>Area</th>
                                                    <th>Usuario</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php

  $resultado =  InvTelecom::find()
                ->joinWith('progresivo')
                ->where(['inv_telecom.id_plantel'=>23])
                ->andWhere(['inv_equipos.id_area'=>167])
                ->all();
$i = 1;
foreach ($resultado as $key => $value) {
               
?>


                                                <tr class="active">
                                                    <td><?=$i?></td>
                                                    <td><?=$value->id_equipo?></td>
                                                    <td><?=$value->ip?></td>
                                                    <td><?=$value->mac?></td>
                                                     <td><?=$value->progresivo->catPlanteles->nombre?></td>
                                                    <td><?=$value->progresivo->catAreas->nombre?></td>
                                                    <td><?=$value->progresivo->usuario?></td>
                                                </tr>

    <?php
 $i++;

 // $value->progresivo->id_area
    // echo "<option value=". $value->id . ">". $value->modelo. "</option>";
            }
    ?>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

      
</div>
</div>
</div>


<!-- Direccion Estudiantil -->

  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
     <div class="panel-heading">
                                <h3 class="panel-title">Direccion Estudiantil</h3>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Progresivo</th>
                                                    <th>IP</th>
                                                    <th>MAC</th>
                                                    <th>Plantel</th>
                                                    <th>Area</th>
                                                    <th>Usuario</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php

  $resultado =  InvTelecom::find()
                ->joinWith('progresivo')
                ->where(['inv_telecom.id_plantel'=>23])
                ->andWhere(['inv_equipos.id_area'=>13])
                ->all();
$i = 1;
foreach ($resultado as $key => $value) {
               
?>


                                                <tr class="active">
                                                    <td><?=$i?></td>
                                                    <td><?=$value->id_equipo?></td>
                                                    <td><?=$value->ip?></td>
                                                    <td><?=$value->mac?></td>
                                                     <td><?=$value->progresivo->catPlanteles->nombre?></td>
                                                    <td><?=$value->progresivo->catAreas->nombre?></td>
                                                    <td><?=$value->progresivo->usuario?></td>
                                                </tr>

    <?php
 $i++;

 // $value->progresivo->id_area
    // echo "<option value=". $value->id . ">". $value->modelo. "</option>";
            }
    ?>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

      
</div>
</div>
</div>

<!-- Direccion Academica -->

  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
     <div class="panel-heading">
                                <h3 class="panel-title">Direccion Academica</h3>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Progresivo</th>
                                                    <th>IP</th>
                                                    <th>MAC</th>
                                                    <th>Plantel</th>
                                                    <th>Area</th>
                                                    <th>Usuario</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php

  $resultado =  InvTelecom::find()
                ->joinWith('progresivo')
                ->where(['inv_telecom.id_plantel'=>23])
                ->andWhere(['inv_equipos.id_area'=>12])
                ->all();
$i = 1;
foreach ($resultado as $key => $value) {
               
?>


                                                <tr class="active">
                                                    <td><?=$i?></td>
                                                    <td><?=$value->id_equipo?></td>
                                                    <td><?=$value->ip?></td>
                                                    <td><?=$value->mac?></td>
                                                     <td><?=$value->progresivo->catPlanteles->nombre?></td>
                                                    <td><?=$value->progresivo->catAreas->nombre?></td>
                                                    <td><?=$value->progresivo->usuario?></td>
                                                </tr>

    <?php
 $i++;

 // $value->progresivo->id_area
    // echo "<option value=". $value->id . ">". $value->modelo. "</option>";
            }
    ?>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

      
</div>
</div>
</div>

<!-- Direccion de Informatica y Telecomunicaciones -->

  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
     <div class="panel-heading">
                                <h3 class="panel-title">Direccion de Informatica y Telecomunicaciones</h3>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Progresivo</th>
                                                    <th>IP</th>
                                                    <th>MAC</th>
                                                    <th>Plantel</th>
                                                    <th>Area</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php

  $resultado =  InvTelecom::find()
                ->joinWith('progresivo')
                ->where(['inv_telecom.id_plantel'=>23])
                ->andWhere(['inv_equipos.id_area'=>2])
                ->all();
$i = 1;
foreach ($resultado as $key => $value) {
               
?>


                                                <tr class="active">
                                                    <td><?=$i?></td>
                                                    <td><?=$value->id_equipo?></td>
                                                    <td><?=$value->ip?></td>
                                                    <td><?=$value->mac?></td>
                                                     <td><?=$value->progresivo->catPlanteles->nombre?></td>
                                                    <td><?=$value->progresivo->catAreas->nombre?><?=$value->progresivo->id_area?></td>
                                                </tr>

    <?php
 $i++;

 // $value->progresivo->id_area
    // echo "<option value=". $value->id . ">". $value->modelo. "</option>";
            }
    ?>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

      
</div>
</div>
</div>

<!-- Direccion de Innovacion -->

  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
     <div class="panel-heading">
                                <h3 class="panel-title">Direccion de Innovación</h3>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Progresivo</th>
                                                    <th>IP</th>
                                                    <th>MAC</th>
                                                    <th>Plantel</th>
                                                    <th>Area</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php

  $resultado =  InvTelecom::find()
                ->joinWith('progresivo')
                ->where(['inv_telecom.id_plantel'=>23])
                ->andWhere(['inv_equipos.id_area'=>171])
                ->all();
$i = 1;
foreach ($resultado as $key => $value) {
               
?>


                                                <tr class="active">
                                                    <td><?=$i?></td>
                                                    <td><?=$value->id_equipo?></td>
                                                    <td><?=$value->ip?></td>
                                                    <td><?=$value->mac?></td>
                                                     <td><?=$value->progresivo->catPlanteles->nombre?></td>
                                                    <td><?=$value->progresivo->catAreas->nombre?><?=$value->progresivo->id_area?></td>
                                                </tr>

    <?php
 $i++;

 // $value->progresivo->id_area
    // echo "<option value=". $value->id . ">". $value->modelo. "</option>";
            }
    ?>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

      
</div>
</div>
</div>

<!-- Direccion  Juridica -->

  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
     <div class="panel-heading">
                                <h3 class="panel-title">Direccion Juridica</h3>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Progresivo</th>
                                                    <th>IP</th>
                                                    <th>MAC</th>
                                                    <th>Plantel</th>
                                                    <th>Area</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php

  $resultado =  InvTelecom::find()
                ->joinWith('progresivo')
                ->where(['inv_telecom.id_plantel'=>23])
                ->andWhere(['inv_equipos.id_area'=>173])
                ->all();
$i = 1;
foreach ($resultado as $key => $value) {
               
?>


                                                <tr class="active">
                                                    <td><?=$i?></td>
                                                    <td><?=$value->id_equipo?></td>
                                                    <td><?=$value->ip?></td>
                                                    <td><?=$value->mac?></td>
                                                     <td><?=$value->progresivo->catPlanteles->nombre?></td>
                                                    <td><?=$value->progresivo->catAreas->nombre?><?=$value->progresivo->id_area?></td>
                                                </tr>

    <?php
 $i++;

 // $value->progresivo->id_area
    // echo "<option value=". $value->id . ">". $value->modelo. "</option>";
            }
    ?>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

      
</div>
</div>
</div>

<!-- Contraloria -->

  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
     <div class="panel-heading">
                                <h3 class="panel-title">Contraloria</h3>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Progresivo</th>
                                                    <th>IP</th>
                                                    <th>MAC</th>
                                                    <th>Plantel</th>
                                                    <th>Area</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php

  $resultado =  InvTelecom::find()
                ->joinWith('progresivo')
                ->where(['inv_telecom.id_plantel'=>23])
                ->andWhere(['inv_equipos.id_area'=>170])
                ->all();
$i = 1;
foreach ($resultado as $key => $value) {
               
?>


                                                <tr class="active">
                                                    <td><?=$i?></td>
                                                    <td><?=$value->id_equipo?></td>
                                                    <td><?=$value->ip?></td>
                                                    <td><?=$value->mac?></td>
                                                     <td><?=$value->progresivo->catPlanteles->nombre?></td>
                                                    <td><?=$value->progresivo->catAreas->nombre?><?=$value->progresivo->id_area?></td>
                                                </tr>

    <?php
 $i++;

 // $value->progresivo->id_area
    // echo "<option value=". $value->id . ">". $value->modelo. "</option>";
            }
    ?>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

      
</div>
</div>
</div>

<!-- Subdirección de Recursos Materiales -->

  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
     <div class="panel-heading">
                                <h3 class="panel-title">Subdirección de Recursos Materiales</h3>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Progresivo</th>
                                                    <th>IP</th>
                                                    <th>MAC</th>
                                                    <th>Plantel</th>
                                                    <th>Area</th>
                                                    <th>Usuario</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php

  $resultado =  InvTelecom::find()
                ->joinWith('progresivo')
                ->where(['inv_telecom.id_plantel'=>23])
                ->andWhere(['inv_equipos.id_area'=>192])
                ->all();
$i = 1;
foreach ($resultado as $key => $value) {
               
?>


                                                <tr class="active">
                                                    <td><?=$i?></td>
                                                    <td><?=$value->id_equipo?></td>
                                                    <td><?=$value->ip?></td>
                                                    <td><?=$value->mac?></td>
                                                     <td><?=$value->progresivo->catPlanteles->nombre?></td>
                                                    <td><?=$value->progresivo->catAreas->nombre?></td>
                                                    <td><?=$value->progresivo->usuario?></td>
                                                </tr>

    <?php
 $i++;

 // $value->progresivo->id_area
    // echo "<option value=". $value->id . ">". $value->modelo. "</option>";
            }
    ?>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

      
</div>
</div>
</div>
</div>