<?php

namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\web\HttpException;

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
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['admin','full_manager','medium_manager','low_manager'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create','update'],
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
     * Displays a single Chapter model.
     * @param integer $idChapter
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idManga, $idChapter)
    {
        if(!Yii::$app->user->can('ChapterViewPost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        return $this->render('view', [
            'model' => $this->findModel($idChapter),
            "IdManga" => $idManga,
        ]);
    }

    /**
     * Creates a new Chapter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idManga)
    {
        if(!Yii::$app->user->can('ChapterCreatePost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

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

            $pathFolder = '/'.'mangas/'.$idManga.'/'.$Chapter->Number;
            $fullPath = Yii::getAlias('@webroot').'/img'.$pathFolder;
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0777, true);
            }

            if($model->Images){
                for($i = 0; $i < count($model->Images)-1; $i++){
                    $Img = UploadedFile::getInstance($model, 'Images['.$i.']');
                    $path = $fullPath.'/'.str_pad($i, 4, '0',false).'.jpg';
                    $Img->saveAs($path);
                }
            }
            $Chapter->SrcFolder = $pathFolder;
            $Chapter->PagesNumber = count($model->Images)-1;
            $Chapter->save();

            return $this->redirect(Yii::$app->request->baseUrl.'/'.'manga/'.$idManga.'/'.'chapter/'.$Chapter->IdChapter);
        }

        return $this->render('create', [
            'model' => $model,
            'Imgs' => null,
        ]);
    }

    /**
     * Updates an existing Chapter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idChapter
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idManga, $idChapter)
    {
        if(!Yii::$app->user->can('ChapterUpdatePost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }
        //throw new HttpException(403,'Update page not finished');

        $Chapter = $this->findModel($idChapter);

        $model = new ChapterForm();
        $model->setVariables($Chapter);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $Chapter = new Chapter();

            $Chapter->Number = $model->Number;
            $Chapter->Name = $model->Name;
            $Chapter->Season = ($model->Season)?$model->Season:1;
            $Chapter->OneShot = $model->OneShot;
            $Chapter->PagesNumber = 0;
            
            $Chapter->Manga_Id = $idManga;
            $Chapter->Manager_Id = Yii::$app->user->identity->manager->IdManager;

            $pathFolder = '/'.'mangas/'.$idManga.'/'.$Chapter->Number;
            $fullPath = Yii::getAlias('@webroot').'/img'.$pathFolder;
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0777, true);
            }

            if($model->Images){
                for($i = 0; $i < count($model->Images)-1; $i++){
                    $Img = UploadedFile::getInstance($model, 'Images['.$i.']');
                    if($Img){
                        $path = $fullPath.'/'.str_pad($i, 4, '0',false).'.jpg';
                        $Img->saveAs($path);
                    }
                }
            }
            $Chapter->SrcFolder = $pathFolder;
            $Chapter->PagesNumber = count($model->Images)-1;
            $Chapter->save();

            return $this->redirect(Yii::$app->request->baseUrl.'/'.'manga/'.$idManga.'/'.'chapter/'.$Chapter->IdChapter);
        }
        $Imagens = null;

        for($i = 0; $i < $Chapter->PagesNumber; $i++){
            $path = Yii::$app->request->baseUrl.'/img'.$Chapter->SrcFolder.'/'.str_pad($i, 4, '0',false).'.jpg';
            if(file_exists($path)) {
                $Imagens[] = $path;
            }else{
                $Imagens[] = Yii::$app->request->baseUrl.'/img/default/error_no_image.jpg';
            }
            
        }

        return $this->render('update', [
            'model' => $model,
            'Imgs' => $Imagens,
        ]);
    }

    /**
     * Deletes an existing Chapter model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idManga
     * @param integer $idChapter
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idManga, $idChapter)
    {
        if(!Yii::$app->user->can('ChapterDeletePost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }
        
        $this->findModel($idChapter)->delete();

        return $this->redirect(Yii::$app->request->baseUrl.'/'.'manga/'.$idManga);
    }

    /**
     * Finds the Chapter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idChapter
     * @return Chapter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idChapter)
    {
        if (($model = Chapter::findOne($idChapter)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
