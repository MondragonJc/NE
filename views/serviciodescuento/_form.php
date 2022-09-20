<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Serviciodescuento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="serviciodescuento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'serdes_fkcat_descuento')->textInput() ?>

    <?= $form->field($model, 'serdes_fkcitaservicio')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
