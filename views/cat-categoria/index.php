<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\CatCategoria;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CatCategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cat Categorias');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-categoria-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cat Categoria'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cat_id',
            'cat_nombre',
            'cat_costo',
            'cat_duracion',
            'cat_imagen',
            //'cat_fkprofesion',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CatCategoria $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'cat_id' => $model->cat_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
