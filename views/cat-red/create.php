<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatRed */

$this->title = Yii::t('app', 'Crear Red');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Redes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-red-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
