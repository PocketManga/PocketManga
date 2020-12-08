<?php

namespace common\models;

use Yii;

use common\models\Manga;
use common\models\MangaAuthor;

/**
 * This is the model class for table "author".
 *
 * @property int $IdAuthor
 * @property string $FirstName
 * @property string|null $LastName
 *
 * @property MangaAuthor[] $mangaAuthors
 * @property Manga[] $mangas
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['FirstName'], 'required'],
            [['FirstName', 'LastName'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdAuthor' => 'Id Author',
            'FirstName' => 'First Name',
            'LastName' => 'Last Name',
        ];
    }

    /**
     * Gets query for [[MangaAuthors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMangaAuthors()
    {
        return $this->hasMany(MangaAuthor::className(), ['Author_Id' => 'IdAuthor']);
    }

    /**
     * Gets query for [[Mangas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMangas()
    {
        return $this->hasMany(Manga::className(), ['IdManga' => 'Manga_Id'])->viaTable('manga_author', ['Author_Id' => 'IdAuthor']);
    }
}
