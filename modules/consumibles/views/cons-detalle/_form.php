<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\modules\consumibles\models\InvConsumibles;
use app\modules\consumibles\models\Consumibles;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\modules\consumibles\models\ConsDetalle */
/* @var $form yii\widgets\ActiveForm */

$items = ArrayHelper::map(InvConsumibles::find()->joinWith('datos')->where(['>', 'existencia', 0])->all(),'datos.id','datos.nombre');
?>

<script>

</script>

<div class="cons-detalle-form">

    <?php $form = ActiveForm::begin(); ?>

     <?
        echo $form->field($model, 'id_cons')->widget(Select2::classname(), [
    'data' => $items,
    'language' => 'es',
    'options' => ['placeholder' => 'Selecciona Producto ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
    ?>  

   
    <?= $form->field($model, 'cantidad')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
