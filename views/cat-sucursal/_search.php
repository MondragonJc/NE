<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatSucursalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-sucursal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'suc_id') ?>

    <?= $form->field($model, 'suc_nombre') ?>

    <?= $form->field($model, 'suc_direccion') ?>

    <?= $form->field($model, 'suc_telefono') ?>

    <?= $form->field($model, 'suc_entrada') ?>

    <?php // echo $form->field($model, 'suc_salida') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
