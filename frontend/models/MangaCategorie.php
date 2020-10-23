<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "manga_categorie".
 *
 * @property int $Categorie_Id
 * @property int $Manga_Id
 *
 * @property Categorie $categorie
 * @property Manga $manga
 */
class MangaCategorie extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manga_categorie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Categorie_Id', 'Manga_Id'], 'required'],
            [['Categorie_Id', 'Manga_Id'], 'integer'],
            [['Categorie_Id', 'Manga_Id'], 'unique', 'targetAttribute' => ['Categorie_Id', 'Manga_Id']],
            [['Categorie_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Categorie::className(), 'targetAttribute' => ['Categorie_Id' => 'IdCategorie']],
            [['Manga_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Manga::className(), 'targetAttribute' => ['Manga_Id' => 'IdManga']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Categorie_Id' => 'Categorie ID',
            'Manga_Id' => 'Manga ID',
        ];
    }

    /**
     * Gets query for [[Categorie]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategorie()
    {
        return $this->hasOne(Categorie::className(), ['IdCategorie' => 'Categorie_Id']);
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
