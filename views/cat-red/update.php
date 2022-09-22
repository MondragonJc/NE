<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatRed */

$this->title = Yii::t('app', 'Actualizar red: {name}', [
    'name' => $model->red_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Redes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->red_id, 'url' => ['view', 'red_id' => $model->red_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cat-red-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
