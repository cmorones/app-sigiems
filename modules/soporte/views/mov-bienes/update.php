<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\MovBienes */

$this->title = 'Update Mov Bienes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mov Bienes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mov-bienes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
