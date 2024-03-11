<?php

namespace backend\controllers;

use common\models\Autok;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AutokController implements the CRUD actions for Autok model.
 */
class AutokController extends Controller
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
     * Lists all Autok models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Autok::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'auto_id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Autok model.
     * @param int $auto_id Auto ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($auto_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($auto_id),
        ]);
    }

    /**
     * Creates a new Autok model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Autok();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'auto_id' => $model->auto_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Autok model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $auto_id Auto ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($auto_id)
    {
        $model = $this->findModel($auto_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'auto_id' => $model->auto_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * Finds the Autok model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $auto_id Auto ID
     * @return Autok the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($auto_id)
    {
        if (($model = Autok::findOne(['auto_id' => $auto_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
