<?php

namespace frontend\models;

use Yii;
use frontend\models\Leitor;
use frontend\models\LibraryList;
use frontend\models\Manga;

/**
 * This is the model class for table "library".
 *
 * @property int $Leitor_Id
 * @property int $Manga_Id
 * @property int|null $List_Id
 *
 * @property Leitor $leitor
 * @property LibraryList $list
 * @property Manga $manga
 */
class Library extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'library';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Leitor_Id', 'Manga_Id'], 'required'],
            [['Leitor_Id', 'Manga_Id', 'List_Id'], 'integer'],
            [['Leitor_Id', 'Manga_Id'], 'unique', 'targetAttribute' => ['Leitor_Id', 'Manga_Id']],
            [['Leitor_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Leitor::className(), 'targetAttribute' => ['Leitor_Id' => 'IdLeitor']],
            [['List_Id'], 'exist', 'skipOnError' => true, 'targetClass' => LibraryList::className(), 'targetAttribute' => ['List_Id' => 'IdList']],
            [['Manga_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Manga::className(), 'targetAttribute' => ['Manga_Id' => 'IdManga']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Leitor_Id' => 'Leitor ID',
            'Manga_Id' => 'Manga ID',
            'List_Id' => 'List ID',
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
     * Gets query for [[List]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getList()
    {
        return $this->hasOne(LibraryList::className(), ['IdList' => 'List_Id']);
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
