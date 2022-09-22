<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\SePersona;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SePersonaSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Personas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="se-persona-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Agregar Persona'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'per_id',
            'per_nombre',
            'per_paterno',
            'per_materno',
            'per_telefono',
            //'per_fkuser',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, SePersona $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'per_id' => $model->per_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
