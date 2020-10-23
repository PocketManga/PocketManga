<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "categorie".
 *
 * @property int $IdCategorie
 * @property string $Name
 * @property string $Language
 * @property string $Slug
 *
 * @property MangaCategorie[] $mangaCategories
 * @property Manga[] $mangas
 */
class Categorie extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categorie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Slug'], 'required'],
            [['Name', 'Language', 'Slug'], 'string', 'max' => 20],
            [['Name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdCategorie' => 'Id Categorie',
            'Name' => 'Name',
            'Language' => 'Language',
            'Slug' => 'Slug',
        ];
    }

    /**
     * Gets query for [[MangaCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMangaCategories()
    {
        return $this->hasMany(MangaCategorie::className(), ['Categorie_Id' => 'IdCategorie']);
    }

    /**
     * Gets query for [[Mangas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMangas()
    {
        return $this->hasMany(Manga::className(), ['IdManga' => 'Manga_Id'])->viaTable('manga_categorie', ['Categorie_Id' => 'IdCategorie']);
    }
}
