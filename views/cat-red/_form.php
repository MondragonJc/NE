<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use app\models\CatPlataforma;
use app\models\SeEmpleado;

/* @var $this yii\web\View */
/* @var $model app\models\CatRed */
/* @var $form yii\widgets\ActiveForm */

/*<?= $form->field($model, 'red_fkempleado')->textInput() ?>*/
/* <?= $form->field($model, 'red_fkempleado')->dropDownList(SeEmpleado::map(), ['prompt' => 'Seleccione El Empleado']) ?>  */
?>

<div class="cat-red-form">

    <?php $form = ActiveForm::begin(); ?>

    
     <?= $form->field($model, 'red_fkempleado')->dropDownList(SeEmpleado::map(), ['prompt' => 'Seleccione El Empleado']) ?>  

    <?= $form->field($model, 'red_fkplataforma')->dropDownList(CatPlataforma::map(), ['prompt' => 'Seleccione la Plataforma']) ?>
    

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
