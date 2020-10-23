<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "manager".
 *
 * @property int $IdManager
 * @property string $Permission
 * @property string $Language
 * @property int $Theme
 * @property int $User_Id
 *
 * @property Chapter[] $chapters
 * @property User $user
 * @property Manga[] $mangas
 */
class Manager extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manager';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Permission', 'User_Id'], 'required'],
            [['Permission'], 'string'],
            [['Theme', 'User_Id'], 'integer'],
            [['Language'], 'string', 'max' => 10],
            [['User_Id'], 'unique'],
            [['User_Id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['User_Id' => 'IdUser']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdManager' => 'Id Manager',
            'Permission' => 'Permission',
            'Language' => 'Language',
            'Theme' => 'Theme',
            'User_Id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Chapters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChapters()
    {
        return $this->hasMany(Chapter::className(), ['Manager_Id' => 'IdManager']);
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

    /**
     * Gets query for [[Mangas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMangas()
    {
        return $this->hasMany(Manga::className(), ['Manager_Id' => 'IdManager']);
    }
}
