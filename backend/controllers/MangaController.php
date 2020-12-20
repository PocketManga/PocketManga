<?php

namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use common\models\Author;
use common\models\Category;
use common\models\Manga;
use common\models\MangaAuthor;
use common\models\MangaCategory;
use backend\models\MangaForm;
use common\models\Server;

/**
 * MangaController implements the CRUD actions for Manga model.
 */
class MangaController extends Controller
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
                        'actions' => ['create'],
                        'roles' => ['admin','full_manager','medium_manager'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update','delete'],
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
     * Lists all Manga models.
     * @return mixed
     */
    public function actionList()
    {
        if(!Yii::$app->user->can('MangaViewPost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $Mangas = Manga::find()->all();

        return $this->render('list', [
            'Mangas' => $Mangas,
        ]);
    }

    /**
     * Displays a single Manga model.
     * @param integer $idManga
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idManga)
    {
        if(!Yii::$app->user->can('MangaViewPost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $Manga = $this->findModel($idManga);
        $Authors = $Manga->getAuthors()->all();
        $Chapters = $Manga->getChapters()->all();
        $Genres = $Manga->getCategories()->all();
        return $this->render('view', [
            'Authors' => $Authors,
            'Chapters' => $Chapters,
            'Genres' => $Genres,
            'Manga' => $Manga,
        ]);
    }

    /**
     * Creates a new Manga model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!Yii::$app->user->can('MangaCreatePost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $model = new MangaForm();
        $Servers = Server::find()->all();
        $Categories = Category::find()->all();
        $Authors = Author::find()->all();
        
        $DDServers = null;
        $DDCategories = null;
        $DDAuthors = null;

        foreach($Servers as $Server){
            $DDServers[$Server->Code] = $Server->Name;
        }

        foreach($Categories as $Category){
            $DDCategories[$Category->IdCategory] = $Category->Name;
        }

        foreach($Authors as $Author){
            $DDAuthors[$Author->IdAuthor] = $Author->FirstName.' '.$Author->LastName;
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $Manga = new Manga();

            $Manga->Title = $model->Title;
            $Manga->AlternativeTitle = $model->AlternativeTitle;
            $Manga->OriginalTitle = $model->OriginalTitle;
            $Manga->Status = $model->Status;
            $Manga->OneShot = $model->OneShot;
            $Manga->R18 = $model->R18;
            $Manga->Server = $model->Server;
            $Manga->ReleaseDate = $model->ReleaseDate;
            $Manga->Description = $model->Description;
            $Manga->Manager_Id = Yii::$app->user->identity->manager->IdManager;

            $Manga->save();

            //var_dump($model->Category);
            //return 'true';
            $MangaCategories = null;
            $MangaAuthors = null;

            if($model->Category){
                $Categories = null;
                foreach($model->Category as $Cat){
                    $existe = false;
                    if($Categories){
                        foreach($Categories as $category){
                            if($Cat == $category){
                                $existe = true;
                            }
                        }
                    }
                    if(!$existe){
                        $Categories[] = $Cat;
                        
                        $MangaCategory = new MangaCategory();
                        $MangaCategory->Category_Id = $Cat;
                        $MangaCategory->Manga_Id = $Manga->IdManga;
                        $MangaCategory->save();
                    }
                }
            }
            if($model->Author){
                $Authors = null;
                foreach($model->Author as $Auth){
                    $existe = false;
                    if($Authors){
                        foreach($Authors as $author){
                            if($Auth == $author){
                                $existe = true;
                            }
                        }
                    }
                    if(!$existe){
                        $Authors[] = $Auth;
                        $MangaAuthor = new MangaAuthor();
                        $MangaAuthor->Author_Id = $Auth;
                        $MangaAuthor->Manga_Id = $Manga->IdManga;
                        $MangaAuthor->save();
                    }
                }
            }
            return $this->redirect(['view', 'idManga' => $Manga->IdManga]);
        }
        return $this->render('create', [
            'model' => $model,
            'Authors' => $DDAuthors,
            'Categories' => $DDCategories,
            'Servers' => $DDServers,
            'RouteType' => false,
        ]);
    }

    /**
     * Updates an existing Manga model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idManga
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idManga)
    {
        if(!Yii::$app->user->can('MangaUpdatePost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $Manga = $this->findModel($idManga);
        
        $model = new MangaForm();

        $model->setVariables($Manga);


        $Servers = Server::find()->all();
        $Categories = Category::find()->all();
        $Authors = Author::find()->all();
        
        $DDServers = null;
        $DDCategories = null;
        $DDAuthors = null;

        foreach($Servers as $Server){
            $DDServers[$Server->Code] = $Server->Name;
        }

        foreach($Categories as $Category){
            $DDCategories[$Category->IdCategory] = $Category->Name;
        }

        foreach($Authors as $Author){
            $DDAuthors[$Author->IdAuthor] = $Author->FirstName.' '.$Author->LastName;
        }


        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $Manga = new Manga();

            $Manga->Title = $model->Title;
            $Manga->AlternativeTitle = $model->AlternativeTitle;
            $Manga->OriginalTitle = $model->OriginalTitle;
            $Manga->Status = $model->Status;
            $Manga->OneShot = $model->OneShot;
            $Manga->R18 = $model->R18;
            $Manga->Server = $model->Server;
            $Manga->ReleaseDate = $model->ReleaseDate;
            $Manga->Description = $model->Description;
            $Manga->Manager_Id = Yii::$app->user->identity->manager->IdManager;

            $Manga->save();

            //var_dump($model->Category);
            //return 'true';
            $MangaCategories = null;
            $MangaAuthors = null;

            if($model->Category){
                $Categories = null;
                foreach($model->Category as $Cat){
                    $existe = false;
                    if($Categories){
                        foreach($Categories as $category){
                            if($Cat == $category){
                                $existe = true;
                            }
                        }
                    }
                    if(!$existe){
                        $Categories[] = $Cat;
                        
                        $MangaCategory = new MangaCategory();
                        $MangaCategory->Category_Id = $Cat;
                        $MangaCategory->Manga_Id = $Manga->IdManga;
                        $MangaCategory->save();
                    }
                }
            }
            if($model->Author){
                $Authors = null;
                foreach($model->Author as $Auth){
                    $existe = false;
                    if($Authors){
                        foreach($Authors as $author){
                            if($Auth == $author){
                                $existe = true;
                            }
                        }
                    }
                    if(!$existe){
                        $Authors[] = $Auth;
                        $MangaAuthor = new MangaAuthor();
                        $MangaAuthor->Author_Id = $Auth;
                        $MangaAuthor->Manga_Id = $Manga->IdManga;
                        $MangaAuthor->save();
                    }
                }
            }
            return $this->redirect(['view', 'idManga' => $Manga->IdManga]);
        }

        return $this->render('update', [
            'model' => $model,
            'Authors' => $DDAuthors,
            'Categories' => $DDCategories,
            'Servers' => $DDServers,
            'RouteType' => true,
        ]);
    }

    /**
     * Deletes an existing Manga model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idManga
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idManga)
    {
        if(!Yii::$app->user->can('MangaDeletePost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $this->findModel($idManga)->delete();

        return $this->redirect(Yii::$app->request->baseUrl.'/manga_list');
    }

    /**
     * Finds the Manga model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idManga
     * @return Manga the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idManga)
    {
        if (($model = Manga::findOne($idManga)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
