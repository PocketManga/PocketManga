<?php

namespace common\models;

use Yii;

use common\models\Manga;
use common\models\MangaCategory;

/**
 * This is the model class for table "category".
 *
 * @property int $IdCategory
 * @property string $Name
 * @property string $Server
 *
 * @property MangaCategory[] $mangaCategories
 * @property Manga[] $mangas
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name'], 'required'],
            [['Name', 'Server'], 'string', 'max' => 20],
            [['Name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdCategory' => 'Id Category',
            'Name' => 'Name',
            'Server' => 'Server',
        ];
    }

    /**
     * Gets query for [[MangaCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMangaCategories()
    {
        return $this->hasMany(MangaCategory::className(), ['Category_Id' => 'IdCategory']);
    }

    /**
     * Gets query for [[Mangas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMangas()
    {
        return $this->hasMany(Manga::className(), ['IdManga' => 'Manga_Id'])->viaTable('manga_category', ['Category_Id' => 'IdCategory']);
    }
}
