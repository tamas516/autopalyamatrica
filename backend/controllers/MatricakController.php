<?php

namespace backend\controllers;

use common\models\Matricak;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MatricakController implements the CRUD actions for Matricak model.
 */
class MatricakController extends Controller
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
     * Lists all Matricak models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Matricak::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'matrica_id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Matricak model.
     * @param int $matrica_id Matrica ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($matrica_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($matrica_id),
        ]);
    }

    /**
     * Creates a new Matricak model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Matricak();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'matrica_id' => $model->matrica_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Matricak model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $matrica_id Matrica ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($matrica_id)
    {
        $model = $this->findModel($matrica_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'matrica_id' => $model->matrica_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Matricak model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $matrica_id Matrica ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($matrica_id)
    {
        $this->findModel($matrica_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Matricak model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $matrica_id Matrica ID
     * @return Matricak the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($matrica_id)
    {
        if (($model = Matricak::findOne(['matrica_id' => $matrica_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
