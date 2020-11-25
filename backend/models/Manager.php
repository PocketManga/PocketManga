<?php

namespace backend\models;

use Yii;

use common\models\Chapter;
use common\models\Manga;
use common\models\User;
/**
 * This is the model class for table "manager".
 *
 * @property int $IdManager
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
            [['Theme', 'User_Id'], 'integer'],
            [['User_Id'], 'required'],
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
