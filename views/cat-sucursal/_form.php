<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatSucursal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-sucursal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'suc_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'suc_direccion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'suc_telefono')->textInput() ?>

    <?= $form->field($model, 'suc_entrada')->textInput() ?>

    <?= $form->field($model, 'suc_salida')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
