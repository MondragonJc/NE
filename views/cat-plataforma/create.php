<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatPlataforma */

$this->title = Yii::t('app', 'Crear Plataforma');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Plataformas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-plataforma-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
