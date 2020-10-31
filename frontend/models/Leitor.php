<?php

namespace frontend\models;

use Yii;

use frontend\models\App;
use frontend\models\ChapterReaded;
use frontend\models\Chapter;
use frontend\models\Favorite;
use frontend\models\Manga;
use frontend\models\LibraryList;
use common\models\User;
use frontend\models\Library;
use frontend\models\MangaReaded;
use frontend\models\Report;

/**
 * This is the model class for table "leitor".
 *
 * @property int $IdLeitor
 * @property int $Theme
 * @property string $MangaShow
 * @property int $ChapterShow
 * @property string $LibraryShow
 * @property string $LastVisit
 * @property string $Language
 * @property string $MangaLanguage
 * @property int|null $PrimaryList_Id
 * @property int $User_Id
 *
 * @property App[] $apps
 * @property ChapterReaded[] $chapterReadeds
 * @property Chapter[] $chapters
 * @property Favorite[] $favorites
 * @property Manga[] $mangas
 * @property LibraryList $primaryList
 * @property User $user
 * @property Library[] $libraries
 * @property Manga[] $mangas0
 * @property MangaReaded[] $mangaReadeds
 * @property Manga[] $mangas1
 * @property Report[] $reports
 */
class Leitor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leitor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Theme', 'ChapterShow', 'PrimaryList_Id', 'User_Id'], 'integer'],
            [['MangaShow', 'LibraryShow', 'User_Id'], 'required'],
            [['MangaShow', 'LibraryShow'], 'string'],
            [['LastVisit'], 'safe'],
            [['Language', 'MangaLanguage'], 'string', 'max' => 10],
            [['User_Id'], 'unique'],
            [['PrimaryList_Id'], 'exist', 'skipOnError' => true, 'targetClass' => LibraryList::className(), 'targetAttribute' => ['PrimaryList_Id' => 'IdList']],
            [['User_Id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['User_Id' => 'IdUser']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdLeitor' => 'Id Leitor',
            'Theme' => 'Theme',
            'MangaShow' => 'Manga Show',
            'ChapterShow' => 'Chapter Show',
            'LibraryShow' => 'Library Show',
            'LastVisit' => 'Last Visit',
            'Language' => 'Language',
            'MangaLanguage' => 'Manga Language',
            'PrimaryList_Id' => 'Primary List ID',
            'User_Id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Apps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApps()
    {
        return $this->hasMany(App::className(), ['Leitor_Id' => 'IdLeitor']);
    }

    /**
     * Gets query for [[ChapterReadeds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChapterReadeds()
    {
        return $this->hasMany(ChapterReaded::className(), ['Leitor_Id' => 'IdLeitor']);
    }

    /**
     * Gets query for [[Chapters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChapters()
    {
        return $this->hasMany(Chapter::className(), ['IdChapter' => 'Chapter_Id'])->viaTable('chapter_readed', ['Leitor_Id' => 'IdLeitor']);
    }

    /**
     * Gets query for [[Favorites]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavorites()
    {
        return $this->hasMany(Favorite::className(), ['Leitor_Id' => 'IdLeitor']);
    }

    /**
     * Gets query for [[Mangas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMangas()
    {
        return $this->hasMany(Manga::className(), ['IdManga' => 'Manga_Id'])->viaTable('favorite', ['Leitor_Id' => 'IdLeitor']);
    }

    /**
     * Gets query for [[PrimaryList]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrimaryList()
    {
        return $this->hasOne(LibraryList::className(), ['IdList' => 'PrimaryList_Id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['IdUser' => 'User_Id']);
    }

    /**
     * Gets query for [[Libraries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLibraries()
    {
        return $this->hasMany(Library::className(), ['Leitor_Id' => 'IdLeitor']);
    }

    /**
     * Gets query for [[Mangas0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMangas0()
    {
        return $this->hasMany(Manga::className(), ['IdManga' => 'Manga_Id'])->viaTable('library', ['Leitor_Id' => 'IdLeitor']);
    }

    /**
     * Gets query for [[MangaReadeds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMangaReadeds()
    {
        return $this->hasMany(MangaReaded::className(), ['Leitor_Id' => 'IdLeitor']);
    }

    /**
     * Gets query for [[Mangas1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMangas1()
    {
        return $this->hasMany(Manga::className(), ['IdManga' => 'Manga_Id'])->viaTable('manga_readed', ['Leitor_Id' => 'IdLeitor']);
    }

    /**
     * Gets query for [[Reports]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReports()
    {
        return $this->hasMany(Report::className(), ['Leitor_Id' => 'IdLeitor']);
    }
}
