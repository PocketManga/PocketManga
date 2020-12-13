<?php

namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use common\models\Leitor;
use common\models\LibraryList;

/**
 * LeitorController implements the CRUD actions for Leitor model.
 */
class LeitorController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Leitor models.
     * @return mixed
     */
    public function actionList()
    {
        $Readers = Leitor::find()->all();

        return $this->render('list', [
            'Readers' => $Readers,
        ]);
    }

    /**
     * Displays a single Leitor model.
     * @param integer $idLeitor
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idLeitor)
    {
        $model = $this->findModel($idLeitor);
        
        $Lists = LibraryList::find()
            ->leftJoin('library li', $on='li.List_Id = library_list.IdList')
            ->leftJoin('leitor le', $on='le.IdLeitor = li.Leitor_Id')
            ->where('le.IdLeitor ='.$idLeitor)
            ->all();

        return $this->render('view', [
            'model' => $model,
            'Lists' => $Lists,
        ]);
    }

    /**
     * Creates a new Leitor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Leitor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idLeitor' => $model->IdLeitor]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Leitor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idLeitor
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idLeitor)
    {
        $model = $this->findModel($idLeitor);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idLeitor' => $model->IdLeitor]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Leitor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idLeitor
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idLeitor)
    {
        $this->findModel($idLeitor)->delete();

        return $this->redirect(Yii::$app->request->baseUrl.'/reader_list');
    }

    /**
     * Finds the Leitor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idLeitor
     * @return Leitor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idLeitor)
    {
        if (($model = Leitor::findOne($idLeitor)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
