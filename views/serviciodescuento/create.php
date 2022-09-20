<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Serviciodescuento */

$this->title = Yii::t('app', 'Create Serviciodescuento');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Serviciodescuentos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="serviciodescuento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
