<?php

namespace common\models;

use Yii;

use common\models\Chapter;
use common\models\Leitor;
use common\models\Manga;

/**
 * This is the model class for table "report".
 *
 * @property int $IdReport
 * @property string $SubjectMatter
 * @property string $Description
 * @property string $SrcImage
 * @property int $Resolved
 * @property string $Created
 * @property int|null $Manga_Id
 * @property int|null $Chapter_Id
 * @property int $Leitor_Id
 *
 * @property Chapter $chapter
 * @property Leitor $leitor
 * @property Manga $manga
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['SubjectMatter', 'Description', 'SrcImage', 'Leitor_Id'], 'required'],
            [['SubjectMatter'], 'string'],
            [['Resolved', 'Manga_Id', 'Chapter_Id', 'Leitor_Id'], 'integer'],
            [['Created'], 'safe'],
            [['Description'], 'string', 'max' => 100],
            [['SrcImage'], 'string', 'max' => 50],
            [['Chapter_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Chapter::className(), 'targetAttribute' => ['Chapter_Id' => 'IdChapter']],
            [['Leitor_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Leitor::className(), 'targetAttribute' => ['Leitor_Id' => 'IdLeitor']],
            [['Manga_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Manga::className(), 'targetAttribute' => ['Manga_Id' => 'IdManga']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdReport' => 'Id Report',
            'SubjectMatter' => 'Subject Matter',
            'Description' => 'Description',
            'SrcImage' => 'Src Image',
            'Resolved' => 'Resolved',
            'Created' => 'Created',
            'Manga_Id' => 'Manga ID',
            'Chapter_Id' => 'Chapter ID',
            'Leitor_Id' => 'Leitor ID',
        ];
    }

    /**
     * Gets query for [[Chapter]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChapter()
    {
        return $this->hasOne(Chapter::className(), ['IdChapter' => 'Chapter_Id']);
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
     * Gets query for [[Manga]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManga()
    {
        return $this->hasOne(Manga::className(), ['IdManga' => 'Manga_Id']);
    }
}
