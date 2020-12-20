<?php

namespace backend\controllers;

use Yii;
use common\models\Report;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ReportController implements the CRUD actions for Report model.
 */
class ReportController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['list'],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['admin','full_manager','medium_manager','low_manager'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['resolved','unresolved'],
                        'roles' => ['admin','full_manager','medium_manager'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['admin','full_manager'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Report models.
     * @return mixed
     */
    public function actionList()
    {
        if(!Yii::$app->user->can('ViewPost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $Reports = Report::find()->all();

        return $this->render('list', [
            'Reports' => $Reports,
        ]);
    }

    /**
     * Displays a single Report model.
     * @param integer $idReport
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idReport)
    {
        if(!Yii::$app->user->can('ViewPost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        return $this->render('view', [
            'model' => $this->findModel($idReport),
        ]);
    }

    /**
     * Deletes an existing Report model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idReport
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionResolved($idReport)
    {
        if(!Yii::$app->user->can('UpdatePost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $report = $this->findModel($idReport);
        $report->Resolved = 1;
        $report->save();

        return $this->redirect(Yii::$app->request->baseUrl.'/'.'report/'.$idReport);
    }

    /**
     * Deletes an existing Report model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idReport
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUnresolved($idReport)
    {
        if(!Yii::$app->user->can('UpdatePost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $report = $this->findModel($idReport);
        $report->Resolved = 0;
        $report->save();

        return $this->redirect(Yii::$app->request->baseUrl.'/'.'report/'.$idReport);
    }

    /**
     * Deletes an existing Report model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idReport
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idReport)
    {
        if(!Yii::$app->user->can('DeletePost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $this->findModel($idReport)->delete();

        return $this->redirect(Yii::$app->request->baseUrl.'/report_list');
    }

    /**
     * Finds the Report model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idReport
     * @return Report the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idReport)
    {
        if (($model = Report::findOne($idReport)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
