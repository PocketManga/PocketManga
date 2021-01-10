<?php

namespace frontend\controllers;

use Yii;
use common\models\Library;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use common\models\Manga;
use common\models\LibraryList;

/**
 * LibraryController implements the CRUD actions for Library model.
 */
class LibraryController extends Controller
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
            ],
        ];
    }

    /**
     * Lists all Library models.
     * @return mixed
     */
    public function actionIndex()
    {
        $primaryList = Yii::$app->user->identity->leitor->PrimaryList_Id;
        $List = null;
        if($primaryList){
            $List = LibraryList::find()->where("IdList = ".$primaryList)->one()->Name;
        }
        if($primaryList == null){
            $List = "All Manga";
        }
        $Lists = null;
        
        $Lists = LibraryList::find()
            ->leftJoin('library li', $on='li.List_Id = library_list.IdList')
            ->leftJoin('leitor le', $on='le.IdLeitor = li.Leitor_Id')
            ->where('le.IdLeitor ='.Yii::$app->user->identity->leitor->IdLeitor)
            ->all();

            
        $UncatList = LibraryList::find()->where('IdList = 1')->one();
        
        $CountAllMangas = count(Manga::find()->all());
        /*$CountUncatMangas = count(Manga::find()
                                    ->leftJoin('library l', $on='manga.IdManga = l.Manga_Id')
                                    ->where('l.Leitor_Id = '.Yii::$app->user->identity->leitor->IdLeitor.' and l.List_Id is null')
                                    ->all());*/

        return $this->render('index',[
            'List' => $List,
            'Lists' => $Lists,
            'CountAM' => $CountAllMangas,
            'UncatList' => $UncatList,
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex2($List)
    {
        return $this->render('index',[
            'List' => $List,
        ]);
    }
}
