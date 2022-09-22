<?php

namespace app\controllers;

use app\models\CatPlataforma;
use app\models\CatPlataformaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CatPlataformaController implements the CRUD actions for CatPlataforma model.
 */
class CatPlataformaController extends Controller
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
     * Lists all CatPlataforma models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CatPlataformaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatPlataforma model.
     * @param int $pla_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($pla_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($pla_id),
        ]);
    }

    /**
     * Creates a new CatPlataforma model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CatPlataforma();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'pla_id' => $model->pla_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CatPlataforma model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $pla_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($pla_id)
    {
        $model = $this->findModel($pla_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pla_id' => $model->pla_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CatPlataforma model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $pla_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($pla_id)
    {
        $this->findModel($pla_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatPlataforma model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $pla_id Id
     * @return CatPlataforma the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pla_id)
    {
        if (($model = CatPlataforma::findOne(['pla_id' => $pla_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
