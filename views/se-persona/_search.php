<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SePersonaSeach */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="se-persona-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'per_id') ?>

    <?= $form->field($model, 'per_nombre') ?>

    <?= $form->field($model, 'per_paterno') ?>

    <?= $form->field($model, 'per_materno') ?>

    <?= $form->field($model, 'per_telefono') ?>

    <?php // echo $form->field($model, 'per_fkuser') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reiniciar'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
