<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatCategoriaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-categoria-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'cat_id') ?>

    <?= $form->field($model, 'cat_nombre') ?>

    <?= $form->field($model, 'cat_costo') ?>

    <?= $form->field($model, 'cat_duracion') ?>

    <?= $form->field($model, 'cat_imagen') ?>

    <?php // echo $form->field($model, 'cat_fkprofesion') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
