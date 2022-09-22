<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatSucursal */

$this->title = Yii::t('app', 'Update Cat Sucursal: {name}', [
    'name' => $model->suc_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cat Sucursals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->suc_id, 'url' => ['view', 'suc_id' => $model->suc_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cat-sucursal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
