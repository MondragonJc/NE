<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SePersona */

$this->title = Yii::t('app', 'Agregar Persona');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Personas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="se-persona-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
