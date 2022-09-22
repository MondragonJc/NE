<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\SePersona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="se-persona-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'per_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_paterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_materno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_fkuser')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
