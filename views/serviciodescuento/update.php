<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Serviciodescuento */

$this->title = Yii::t('app', 'Update Serviciodescuento: {name}', [
    'name' => $model->serdes_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Serviciodescuentos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->serdes_id, 'url' => ['view', 'serdes_id' => $model->serdes_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="serviciodescuento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
