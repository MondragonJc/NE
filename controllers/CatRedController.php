<?php

namespace app\controllers;

use app\models\CatRed;
use app\models\CatRedSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CatRedController implements the CRUD actions for CatRed model.
 */
class CatRedController extends Controller
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
     * Lists all CatRed models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CatRedSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatRed model.
     * @param int $red_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($red_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($red_id),
        ]);
    }

    /**
     * Creates a new CatRed model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CatRed();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'red_id' => $model->red_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CatRed model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $red_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($red_id)
    {
        $model = $this->findModel($red_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'red_id' => $model->red_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CatRed model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $red_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($red_id)
    {
        $this->findModel($red_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatRed model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $red_id Id
     * @return CatRed the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($red_id)
    {
        if (($model = CatRed::findOne(['red_id' => $red_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
