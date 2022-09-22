<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatPlataforma */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-plataforma-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pla_nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
