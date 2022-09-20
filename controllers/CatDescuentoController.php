<?php

namespace app\controllers;

use app\models\CatDescuento;
use app\models\CatDescuentoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CatDescuentoController implements the CRUD actions for CatDescuento model.
 */
class CatDescuentoController extends Controller
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
     * Lists all CatDescuento models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CatDescuentoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatDescuento model.
     * @param int $des_id id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($des_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($des_id),
        ]);
    }

    /**
     * Creates a new CatDescuento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CatDescuento();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'des_id' => $model->des_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CatDescuento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $des_id id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($des_id)
    {
        $model = $this->findModel($des_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'des_id' => $model->des_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CatDescuento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $des_id id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($des_id)
    {
        $this->findModel($des_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatDescuento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $des_id id
     * @return CatDescuento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($des_id)
    {
        if (($model = CatDescuento::findOne(['des_id' => $des_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
