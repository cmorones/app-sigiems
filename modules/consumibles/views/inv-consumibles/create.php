<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\consumibles\models\InvConsumibles */

$this->title = 'Create Inv Consumibles';
$this->params['breadcrumbs'][] = ['label' => 'Inv Consumibles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inv-consumibles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
