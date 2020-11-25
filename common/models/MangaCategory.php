<?php

namespace app\models;

use Yii;

use common\models\Category;
use common\models\Manga;

/**
 * This is the model class for table "manga_category".
 *
 * @property int $Category_Id
 * @property int $Manga_Id
 *
 * @property Category $category
 * @property Manga $manga
 */
class MangaCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manga_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Category_Id', 'Manga_Id'], 'required'],
            [['Category_Id', 'Manga_Id'], 'integer'],
            [['Category_Id', 'Manga_Id'], 'unique', 'targetAttribute' => ['Category_Id', 'Manga_Id']],
            [['Category_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['Category_Id' => 'IdCategory']],
            [['Manga_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Manga::className(), 'targetAttribute' => ['Manga_Id' => 'IdManga']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Category_Id' => 'Category ID',
            'Manga_Id' => 'Manga ID',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['IdCategory' => 'Category_Id']);
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
