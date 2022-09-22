<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatCategoria */

$this->title = Yii::t('app', 'Update Cat Categoria: {name}', [
    'name' => $model->cat_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cat Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cat_id, 'url' => ['view', 'cat_id' => $model->cat_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cat-categoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
