<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatDescuento */

$this->title = Yii::t('app', 'Update Cat Descuento: {name}', [
    'name' => $model->des_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cat Descuentos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->des_id, 'url' => ['view', 'des_id' => $model->des_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cat-descuento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
