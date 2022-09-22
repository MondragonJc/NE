<?php

namespace app\controllers;

use app\models\SePersona;
use app\models\SePersonaSeach;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SePersonaController implements the CRUD actions for SePersona model.
 */
class SePersonaController extends Controller
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
     * Lists all SePersona models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SePersonaSeach();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SePersona model.
     * @param int $per_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($per_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($per_id),
        ]);
    }

    /**
     * Creates a new SePersona model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new SePersona();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'per_id' => $model->per_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SePersona model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $per_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($per_id)
    {
        $model = $this->findModel($per_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'per_id' => $model->per_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SePersona model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $per_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($per_id)
    {
        $this->findModel($per_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SePersona model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $per_id Id
     * @return SePersona the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($per_id)
    {
        if (($model = SePersona::findOne(['per_id' => $per_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
