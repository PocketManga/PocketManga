<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $IdComment
 * @property string $Comment
 * @property string $Updated
 * @property string $Created
 * @property int $User_Id
 * @property int|null $Chapter_Id
 * @property int|null $Manga_Id
 * @property int|null $CommentDad_Id
 *
 * @property Chapter $chapter
 * @property Comment $commentDad
 * @property Comment[] $comments
 * @property Manga $manga
 * @property User $user
 * @property Like[] $likes
 * @property User[] $users
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Comment', 'User_Id'], 'required'],
            [['Comment'], 'string'],
            [['Updated', 'Created'], 'safe'],
            [['User_Id', 'Chapter_Id', 'Manga_Id', 'CommentDad_Id'], 'integer'],
            [['Chapter_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Chapter::className(), 'targetAttribute' => ['Chapter_Id' => 'IdChapter']],
            [['CommentDad_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['CommentDad_Id' => 'IdComment']],
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
            'IdComment' => 'Id Comment',
            'Comment' => 'Comment',
            'Updated' => 'Updated',
            'Created' => 'Created',
            'User_Id' => 'User ID',
            'Chapter_Id' => 'Chapter ID',
            'Manga_Id' => 'Manga ID',
            'CommentDad_Id' => 'Comment Dad ID',
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
     * Gets query for [[CommentDad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCommentDad()
    {
        return $this->hasOne(Comment::className(), ['IdComment' => 'CommentDad_Id']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['CommentDad_Id' => 'IdComment']);
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

    /**
     * Gets query for [[Likes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Like::className(), ['Comment_Id' => 'IdComment']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['IdUser' => 'User_Id'])->viaTable('like', ['Comment_Id' => 'IdComment']);
    }
}
