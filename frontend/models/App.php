<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "app".
 *
 * @property int $IdApp
 * @property int $Theme
 * @property int $MangaShow
 * @property int $ChapterShow
 * @property string $Language
 * @property string $MangaLanguage
 * @property int $Leitor_Id
 *
 * @property Leitor $leitor
 * @property AppLibrary[] $appLibraries
 * @property Manga[] $mangas
 */
class App extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Theme', 'MangaShow', 'ChapterShow', 'Leitor_Id'], 'integer'],
            [['Leitor_Id'], 'required'],
            [['Language', 'MangaLanguage'], 'string', 'max' => 10],
            [['Leitor_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Leitor::className(), 'targetAttribute' => ['Leitor_Id' => 'IdLeitor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdApp' => 'Id App',
            'Theme' => 'Theme',
            'MangaShow' => 'Manga Show',
            'ChapterShow' => 'Chapter Show',
            'Language' => 'Language',
            'MangaLanguage' => 'Manga Language',
            'Leitor_Id' => 'Leitor ID',
        ];
    }

    /**
     * Gets query for [[Leitor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLeitor()
    {
        return $this->hasOne(Leitor::className(), ['IdLeitor' => 'Leitor_Id']);
    }

    /**
     * Gets query for [[AppLibraries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAppLibraries()
    {
        return $this->hasMany(AppLibrary::className(), ['App_Id' => 'IdApp']);
    }

    /**
     * Gets query for [[Mangas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMangas()
    {
        return $this->hasMany(Manga::className(), ['IdManga' => 'Manga_Id'])->viaTable('app_library', ['App_Id' => 'IdApp']);
    }
}
