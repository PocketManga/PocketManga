<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "manga_readed".
 *
 * @property int $Leitor_Id
 * @property int $Manga_Id
 *
 * @property Leitor $leitor
 * @property Manga $manga
 */
class MangaReaded extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manga_readed';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Leitor_Id', 'Manga_Id'], 'required'],
            [['Leitor_Id', 'Manga_Id'], 'integer'],
            [['Leitor_Id', 'Manga_Id'], 'unique', 'targetAttribute' => ['Leitor_Id', 'Manga_Id']],
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
            'Leitor_Id' => 'Leitor ID',
            'Manga_Id' => 'Manga ID',
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
     * Gets query for [[Manga]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManga()
    {
        return $this->hasOne(Manga::className(), ['IdManga' => 'Manga_Id']);
    }
}
