<?php

use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;
use app\models\CatProfesion;
use yii\bootstrap5\ActiveForm;



/* @var $this yii\web\View */
/* @var $model app\models\CatCategoria */
/* @var $form yii\widgets\ActiveForm */

$profesiones=ArrayHelper::map(CatProfesion::find()->all(), 'pro_id', 'pro_nombre');
?>

<div class="cat-categoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cat_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cat_costo')->textInput() ?>

    <?= $form->field($model, 'cat_duracion')->textInput() ?>

    <?= $form->field($model, 'cat_imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cat_fkprofesion')->dropDownList($profesiones,['prompt' => 'Selecciona una opcion']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
