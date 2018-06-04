<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvServers */

$this->title = 'Update Inv Servers: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inv Servers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inv-servers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
