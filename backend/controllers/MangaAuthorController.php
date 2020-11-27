<?php

namespace backend\controllers;

use Yii;
use common\models\MangaAuthor;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MangaAuthorController implements the CRUD actions for MangaAuthor model.
 */
class MangaAuthorController extends Controller
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
     * Lists all MangaAuthor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => MangaAuthor::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MangaAuthor model.
     * @param integer $Author_Id
     * @param integer $Manga_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Author_Id, $Manga_Id)
    {
        return $this->render('view', [
            'model' => $this->findModel($Author_Id, $Manga_Id),
        ]);
    }

    /**
     * Creates a new MangaAuthor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MangaAuthor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Author_Id' => $model->Author_Id, 'Manga_Id' => $model->Manga_Id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MangaAuthor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Author_Id
     * @param integer $Manga_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Author_Id, $Manga_Id)
    {
        $model = $this->findModel($Author_Id, $Manga_Id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Author_Id' => $model->Author_Id, 'Manga_Id' => $model->Manga_Id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MangaAuthor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Author_Id
     * @param integer $Manga_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Author_Id, $Manga_Id)
    {
        $this->findModel($Author_Id, $Manga_Id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MangaAuthor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Author_Id
     * @param integer $Manga_Id
     * @return MangaAuthor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Author_Id, $Manga_Id)
    {
        if (($model = MangaAuthor::findOne(['Author_Id' => $Author_Id, 'Manga_Id' => $Manga_Id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
