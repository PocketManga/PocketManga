<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "like".
 *
 * @property int $User_Id
 * @property int $Comment_Id
 *
 * @property Comment $comment
 * @property User $user
 */
class Like extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'like';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['User_Id', 'Comment_Id'], 'required'],
            [['User_Id', 'Comment_Id'], 'integer'],
            [['User_Id', 'Comment_Id'], 'unique', 'targetAttribute' => ['User_Id', 'Comment_Id']],
            [['Comment_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['Comment_Id' => 'IdComment']],
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
            'Comment_Id' => 'Comment ID',
        ];
    }

    /**
     * Gets query for [[Comment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComment()
    {
        return $this->hasOne(Comment::className(), ['IdComment' => 'Comment_Id']);
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
