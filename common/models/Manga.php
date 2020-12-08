<?php

namespace common\models;

use Yii;

use backend\models\App;
use backend\models\AppLibrary;
use common\models\Author;
use common\models\Category;
use common\models\Chapter;
use frontend\models\Comment;
use common\models\Favorite;
use common\models\Leitor;
use common\models\Library;
use backend\models\Manager;
use common\models\MangaAuthor;
use common\models\MangaCategory;
use frontend\models\MangaReaded;
use frontend\models\Rating;
use common\models\Report;
use common\models\User;

/**
 * This is the model class for table "manga".
 *
 * @property int $IdManga
 * @property string $Title
 * @property string|null $AlternativeTitle
 * @property string $OriginalTitle
 * @property int $Status
 * @property int $OneShot
 * @property int $R18
 * @property string|null $Server
 * @property string|null $SrcImage
 * @property string $ReleaseDate
 * @property string $Updated
 * @property string $Description
 * @property int $Manager_Id
 *
 * @property AppLibrary[] $appLibraries
 * @property App[] $apps
 * @property Chapter[] $chapters
 * @property Comment[] $comments
 * @property Favorite[] $favorites
 * @property Leitor[] $leitors
 * @property Library[] $libraries
 * @property Leitor[] $leitors0
 * @property Manager $manager
 * @property MangaAuthor[] $mangaAuthors
 * @property Author[] $authors
 * @property MangaCategory[] $mangaCategories
 * @property Category[] $categories
 * @property MangaReaded[] $mangaReadeds
 * @property Leitor[] $leitors1
 * @property Rating[] $ratings
 * @property User[] $users
 * @property Report[] $reports
 */
class Manga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Title', 'OriginalTitle', 'ReleaseDate', 'Description', 'Manager_Id'], 'required'],
            [['Status', 'OneShot', 'R18', 'Manager_Id'], 'integer'],
            [['ReleaseDate', 'Updated'], 'safe'],
            [['Description'], 'string'],
            [['Title', 'AlternativeTitle', 'OriginalTitle'], 'string', 'max' => 100],
            [['Server'], 'string', 'max' => 10],
            [['SrcImage'], 'string', 'max' => 50],
            [['Manager_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Manager::className(), 'targetAttribute' => ['Manager_Id' => 'IdManager']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdManga' => 'Id Manga',
            'Title' => 'Title',
            'AlternativeTitle' => 'Alternative Title',
            'OriginalTitle' => 'Original Title',
            'Status' => 'Status',
            'OneShot' => 'One Shot',
            'R18' => 'R18',
            'Server' => 'Server',
            'SrcImage' => 'Src Image',
            'ReleaseDate' => 'Release Date',
            'Updated' => 'Updated',
            'Description' => 'Description',
            'Manager_Id' => 'Manager ID',
        ];
    }

    /**
     * Gets query for [[AppLibraries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAppLibraries()
    {
        return $this->hasMany(AppLibrary::className(), ['Manga_Id' => 'IdManga']);
    }

    /**
     * Gets query for [[Apps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApps()
    {
        return $this->hasMany(App::className(), ['IdApp' => 'App_Id'])->viaTable('app_library', ['Manga_Id' => 'IdManga']);
    }

    /**
     * Gets query for [[Chapters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChapters()
    {
        return $this->hasMany(Chapter::className(), ['Manga_Id' => 'IdManga']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['Manga_Id' => 'IdManga']);
    }

    /**
     * Gets query for [[Favorites]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavorites()
    {
        return $this->hasMany(Favorite::className(), ['Manga_Id' => 'IdManga']);
    }

    /**
     * Gets query for [[Leitors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLeitors()
    {
        return $this->hasMany(Leitor::className(), ['IdLeitor' => 'Leitor_Id'])->viaTable('favorite', ['Manga_Id' => 'IdManga']);
    }

    /**
     * Gets query for [[Libraries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLibraries()
    {
        return $this->hasMany(Library::className(), ['Manga_Id' => 'IdManga']);
    }

    /**
     * Gets query for [[Leitors0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLeitors0()
    {
        return $this->hasMany(Leitor::className(), ['IdLeitor' => 'Leitor_Id'])->viaTable('library', ['Manga_Id' => 'IdManga']);
    }

    /**
     * Gets query for [[Manager]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManager()
    {
        return $this->hasOne(Manager::className(), ['IdManager' => 'Manager_Id']);
    }

    /**
     * Gets query for [[MangaAuthors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMangaAuthors()
    {
        return $this->hasMany(MangaAuthor::className(), ['Manga_Id' => 'IdManga']);
    }

    /**
     * Gets query for [[Authors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Author::className(), ['IdAuthor' => 'Author_Id'])->viaTable('manga_author', ['Manga_Id' => 'IdManga']);
    }

    /**
     * Gets query for [[MangaCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMangaCategories()
    {
        return $this->hasMany(MangaCategory::className(), ['Manga_Id' => 'IdManga']);
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['IdCategory' => 'Category_Id'])->viaTable('manga_category', ['Manga_Id' => 'IdManga']);
    }

    /**
     * Gets query for [[MangaReadeds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMangaReadeds()
    {
        return $this->hasMany(MangaReaded::className(), ['Manga_Id' => 'IdManga']);
    }

    /**
     * Gets query for [[Leitors1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLeitors1()
    {
        return $this->hasMany(Leitor::className(), ['IdLeitor' => 'Leitor_Id'])->viaTable('manga_readed', ['Manga_Id' => 'IdManga']);
    }

    /**
     * Gets query for [[Ratings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRatings()
    {
        return $this->hasMany(Rating::className(), ['Manga_Id' => 'IdManga']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['IdUser' => 'User_Id'])->viaTable('rating', ['Manga_Id' => 'IdManga']);
    }

    /**
     * Gets query for [[Reports]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReports()
    {
        return $this->hasMany(Report::className(), ['Manga_Id' => 'IdManga']);
    }
}
