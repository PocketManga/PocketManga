<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "rating".
 *
 * @property int $User_Id
 * @property int $Manga_Id
 * @property int $Stars
 *
 * @property Manga $manga
 * @property User $user
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['User_Id', 'Manga_Id'], 'required'],
            [['User_Id', 'Manga_Id', 'Stars'], 'integer'],
            [['User_Id', 'Manga_Id'], 'unique', 'targetAttribute' => ['User_Id', 'Manga_Id']],
            [['Manga_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Manga::className(), 'targetAttribute' => ['Manga_Id' => 'IdManga']],
            [['User_Id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['User_Id' => 'IdUser']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'User_Id' => 'User ID',
            'Manga_Id' => 'Manga ID',
            'Stars' => 'Stars',
        ];
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['IdUser' => 'User_Id']);
    }
}
