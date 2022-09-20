<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatDescuento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-descuento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'des_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'des_inicio')->textInput() ?>

    <?= $form->field($model, 'des_fin')->textInput() ?>

    <?= $form->field($model, 'des_porcetanje')->textInput() ?>

    <?= $form->field($model, 'des_estatus')->dropDownList([ 'Activo' => 'Activo', 'Inactivo' => 'Inactivo', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
