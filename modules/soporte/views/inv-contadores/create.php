<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvContadores */

$this->title = 'Create Inv Contadores';
$this->params['breadcrumbs'][] = ['label' => 'Inv Contadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inv-contadores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
