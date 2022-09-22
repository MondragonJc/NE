<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\CatRed;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CatRedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Redes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-red-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Agregar Red'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'red_id',
            'red_fkempleado',
            'red_fkplataforma',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CatRed $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'red_id' => $model->red_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
