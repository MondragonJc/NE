<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CatSucursal */

$this->title = $model->suc_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cat Sucursals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cat-sucursal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'suc_id' => $model->suc_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'suc_id' => $model->suc_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'suc_id',
            'suc_nombre',
            'suc_direccion:ntext',
            'suc_telefono',
            'suc_entrada',
            'suc_salida',
        ],
    ]) ?>

</div>
