<?php

namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

use common\models\Chapter;
use backend\models\ChapterForm;

/**
 * ChapterController implements the CRUD actions for Chapter model.
 */
class ChapterController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'index2'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index','index2'],
                        'roles' => ['@'],
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
     * Displays a single Chapter model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idManga, $idChapter)
    {
        return $this->render('view', [
            'model' => $this->findModel($idChapter),
        ]);
    }

    /**
     * Creates a new Chapter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idManga)
    {
        $model = new ChapterForm();
        $model->Season = 1;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $Chapter = new Chapter();

            $Chapter->Number = $model->Number;
            $Chapter->Name = $model->Name;
            $Chapter->Season = ($model->Season)?$model->Season:1;
            $Chapter->OneShot = $model->OneShot;
            $Chapter->PagesNumber = 0;
            
            $Chapter->Manga_Id = $idManga;
            $Chapter->Manager_Id = Yii::$app->user->identity->manager->IdManager;

            $Chapter->save();

            $Images = UploadedFile::getInstances($model, 'Images');
            $pathFolder = '/'.'mangas/'.$idManga.'/'.$Chapter->IdChapter;
            $num = 0;
            foreach($Images as $Image){
                $path = $pathFolder.'/'.str_pad($num, 4, '0',false).'.jpg';
                $Image->saveAs($path);
                $num++;
            }

            $Chapter->PagesNumber = count($Images);
            $Chapter->SrcFolder = $pathFolder;
            return $pathFolder;
            $Chapter->save();

            return $this->redirect(['view', 'idChapter' => $Chapter->IdChapter]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Chapter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IdChapter]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Chapter model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idChapter, $idManga)
    {
        $this->findModel($idChapter)->delete();

        return $this->redirect(Yii::$app->request->baseUrl.'/'.'manga/'.$idManga);
    }

    /**
     * Finds the Chapter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Chapter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Chapter::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
