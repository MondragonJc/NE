<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatDescuento */

$this->title = Yii::t('app', 'Create Cat Descuento');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cat Descuentos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-descuento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
