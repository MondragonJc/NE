<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\CatPlataforma;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CatPlataformaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Plataformas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-plataforma-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Plataforma'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pla_id',
            'pla_nombre',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CatPlataforma $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'pla_id' => $model->pla_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
