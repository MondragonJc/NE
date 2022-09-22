<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatPlataforma */

$this->title = Yii::t('app', 'Actualizar Plataforma: {name}', [
    'name' => $model->pla_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Plataformas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pla_id, 'url' => ['view', 'pla_id' => $model->pla_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cat-plataforma-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
