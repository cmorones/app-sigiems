<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvServers */

$this->title = 'Create Inv Servers';
$this->params['breadcrumbs'][] = ['label' => 'Inv Servers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inv-servers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
