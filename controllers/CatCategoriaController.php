<?php

namespace app\controllers;

use app\models\CatCategoria;
use app\models\CatCategoriaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CatCategoriaController implements the CRUD actions for CatCategoria model.
 */
class CatCategoriaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all CatCategoria models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CatCategoriaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatCategoria model.
     * @param int $cat_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($cat_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($cat_id),
        ]);
    }

    /**
     * Creates a new CatCategoria model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CatCategoria();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'cat_id' => $model->cat_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CatCategoria model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $cat_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($cat_id)
    {
        $model = $this->findModel($cat_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cat_id' => $model->cat_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CatCategoria model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $cat_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($cat_id)
    {
        $this->findModel($cat_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatCategoria model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $cat_id Id
     * @return CatCategoria the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($cat_id)
    {
        if (($model = CatCategoria::findOne(['cat_id' => $cat_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
