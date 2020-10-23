<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "chapter_readed".
 *
 * @property int $Leitor_Id
 * @property int $Chapter_Id
 *
 * @property Leitor $leitor
 * @property Chapter $chapter
 */
class ChapterReaded extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chapter_readed';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Leitor_Id', 'Chapter_Id'], 'required'],
            [['Leitor_Id', 'Chapter_Id'], 'integer'],
            [['Leitor_Id', 'Chapter_Id'], 'unique', 'targetAttribute' => ['Leitor_Id', 'Chapter_Id']],
            [['Leitor_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Leitor::className(), 'targetAttribute' => ['Leitor_Id' => 'IdLeitor']],
            [['Chapter_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Chapter::className(), 'targetAttribute' => ['Chapter_Id' => 'IdChapter']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Leitor_Id' => 'Leitor ID',
            'Chapter_Id' => 'Chapter ID',
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
     * Gets query for [[Chapter]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChapter()
    {
        return $this->hasOne(Chapter::className(), ['IdChapter' => 'Chapter_Id']);
    }
}
