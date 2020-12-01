<?php

namespace common\models;

use Yii;

use common\models\Author;
use common\models\Manga;

/**
 * This is the model class for table "manga_author".
 *
 * @property int $Author_Id
 * @property int $Manga_Id
 *
 * @property Author $author
 * @property Manga $manga
 */
class MangaAuthor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manga_author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Author_Id', 'Manga_Id'], 'required'],
            [['Author_Id', 'Manga_Id'], 'integer'],
            [['Author_Id', 'Manga_Id'], 'unique', 'targetAttribute' => ['Author_Id', 'Manga_Id']],
            [['Author_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::className(), 'targetAttribute' => ['Author_Id' => 'IdAuthor']],
            [['Manga_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Manga::className(), 'targetAttribute' => ['Manga_Id' => 'IdManga']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Author_Id' => 'Author ID',
            'Manga_Id' => 'Manga ID',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['IdAuthor' => 'Author_Id']);
    }

    /**
     * Gets query for [[Manga]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManga()
    {
        return $this->hasOne(Manga::className(), ['IdManga' => 'Manga_Id']);
    }
}
