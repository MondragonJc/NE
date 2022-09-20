<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CatDescuentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cat Descuentos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-descuento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cat Descuento'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'des_id',
            'des_nombre',
            'des_inicio',
            'des_fin',
            'des_porcetanje',
            //'des_estatus',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CatDescuento $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'des_id' => $model->des_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
