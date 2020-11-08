<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chapter".
 *
 * @property int $IdChapter
 * @property float $Number
 * @property string|null $Name
 * @property string $ReleaseDate
 * @property string $Updated
 * @property int|null $Season
 * @property int $OneShot
 * @property string $SrcFolder
 * @property string $Slug
 * @property int $Manga_Id
 * @property int $Manager_Id
 *
 * @property Manager $manager
 * @property Manga $manga
 * @property ChapterReaded[] $chapterReadeds
 * @property Leitor[] $leitors
 * @property Comment[] $comments
 * @property Report[] $reports
 */
class Chapter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chapter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Number', 'SrcFolder', 'Slug', 'Manga_Id', 'Manager_Id'], 'required'],
            [['Number'], 'number'],
            [['ReleaseDate', 'Updated'], 'safe'],
            [['Season', 'OneShot', 'Manga_Id', 'Manager_Id'], 'integer'],
            [['Name'], 'string', 'max' => 100],
            [['SrcFolder', 'Slug'], 'string', 'max' => 50],
            [['Manager_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Manager::className(), 'targetAttribute' => ['Manager_Id' => 'IdManager']],
            [['Manga_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Manga::className(), 'targetAttribute' => ['Manga_Id' => 'IdManga']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdChapter' => 'Id Chapter',
            'Number' => 'Number',
            'Name' => 'Name',
            'ReleaseDate' => 'Release Date',
            'Updated' => 'Updated',
            'Season' => 'Season',
            'OneShot' => 'One Shot',
            'SrcFolder' => 'Src Folder',
            'Slug' => 'Slug',
            'Manga_Id' => 'Manga ID',
            'Manager_Id' => 'Manager ID',
        ];
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
     * Gets query for [[Manga]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManga()
    {
        return $this->hasOne(Manga::className(), ['IdManga' => 'Manga_Id']);
    }

    /**
     * Gets query for [[ChapterReadeds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChapterReadeds()
    {
        return $this->hasMany(ChapterReaded::className(), ['Chapter_Id' => 'IdChapter']);
    }

    /**
     * Gets query for [[Leitors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLeitors()
    {
        return $this->hasMany(Leitor::className(), ['IdLeitor' => 'Leitor_Id'])->viaTable('chapter_readed', ['Chapter_Id' => 'IdChapter']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['Chapter_Id' => 'IdChapter']);
    }

    /**
     * Gets query for [[Reports]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReports()
    {
        return $this->hasMany(Report::className(), ['Chapter_Id' => 'IdChapter']);
    }
}
