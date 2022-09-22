<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatCategoria */

$this->title = Yii::t('app', 'Create Cat Categoria');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cat Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-categoria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
