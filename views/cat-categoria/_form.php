<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatCategoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-categoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cat_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cat_costo')->textInput() ?>

    <?= $form->field($model, 'cat_duracion')->textInput() ?>

    <?= $form->field($model, 'cat_imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cat_fkprofesion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
