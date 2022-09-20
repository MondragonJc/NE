<?php

namespace app\models;

use app\models\Serviciodescuento;
use app\models\ServiciodescuentoSheard;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ServiciodescuentoController implements the CRUD actions for Serviciodescuento model.
 */
class ServiciodescuentoController extends Controller
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
     * Lists all Serviciodescuento models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ServiciodescuentoSheard();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Serviciodescuento model.
     * @param int $serdes_id Serdes ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($serdes_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($serdes_id),
        ]);
    }

    /**
     * Creates a new Serviciodescuento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Serviciodescuento();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'serdes_id' => $model->serdes_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Serviciodescuento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $serdes_id Serdes ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($serdes_id)
    {
        $model = $this->findModel($serdes_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'serdes_id' => $model->serdes_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Serviciodescuento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $serdes_id Serdes ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($serdes_id)
    {
        $this->findModel($serdes_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Serviciodescuento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $serdes_id Serdes ID
     * @return Serviciodescuento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($serdes_id)
    {
        if (($model = Serviciodescuento::findOne(['serdes_id' => $serdes_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
