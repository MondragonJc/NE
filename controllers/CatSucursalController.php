<?php

namespace app\controllers;

use app\models\CatSucursal;
use app\models\CatSucursalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CatSucursalController implements the CRUD actions for CatSucursal model.
 */
class CatSucursalController extends Controller
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
     * Lists all CatSucursal models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CatSucursalSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatSucursal model.
     * @param int $suc_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($suc_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($suc_id),
        ]);
    }

    /**
     * Creates a new CatSucursal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CatSucursal();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'suc_id' => $model->suc_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CatSucursal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $suc_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($suc_id)
    {
        $model = $this->findModel($suc_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'suc_id' => $model->suc_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CatSucursal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $suc_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($suc_id)
    {
        $this->findModel($suc_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatSucursal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $suc_id Id
     * @return CatSucursal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($suc_id)
    {
        if (($model = CatSucursal::findOne(['suc_id' => $suc_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
