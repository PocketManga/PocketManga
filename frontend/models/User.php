<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $IdUser
 * @property string $Username
 * @property string $Email
 * @property string $Genre
 * @property string $BirthDate
 * @property string $SrcPhoto
 * @property string $Created
 * @property string $Updated
 * @property string $Slug
 * @property int $SoftDelete
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property int $status
 * @property string|null $verification_token
 *
 * @property Comment[] $comments
 * @property Leitor $leitor
 * @property Like[] $likes
 * @property Comment[] $comments0
 * @property Manager $manager
 * @property Rating[] $ratings
 * @property Manga[] $mangas
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Username', 'Email', 'Genre', 'BirthDate', 'SrcPhoto', 'Slug', 'auth_key', 'password_hash'], 'required'],
            [['Genre'], 'string'],
            [['BirthDate', 'Created', 'Updated'], 'safe'],
            [['SoftDelete', 'status'], 'integer'],
            [['Username', 'SrcPhoto', 'Slug'], 'string', 'max' => 50],
            [['Email','auth_key'], 'string', 'max' => 100],
            [['password_hash', 'password_reset_token', 'verification_token'], 'string', 'max' => 255],
            [['Username'], 'unique'],
            [['Email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdUser' => 'Id User',
            'Username' => 'Username',
            'Email' => 'Email',
            'Genre' => 'Genre',
            'BirthDate' => 'Birth Date',
            'SrcPhoto' => 'Src Photo',
            'Created' => 'Created',
            'Updated' => 'Updated',
            'Slug' => 'Slug',
            'SoftDelete' => 'Soft Delete',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'status' => 'Status',
            'verification_token' => 'Verification Token',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['User_Id' => 'IdUser']);
    }

    /**
     * Gets query for [[Leitor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLeitor()
    {
        return $this->hasOne(Leitor::className(), ['User_Id' => 'IdUser']);
    }

    /**
     * Gets query for [[Likes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Like::className(), ['User_Id' => 'IdUser']);
    }

    /**
     * Gets query for [[Comments0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments0()
    {
        return $this->hasMany(Comment::className(), ['IdComment' => 'Comment_Id'])->viaTable('like', ['User_Id' => 'IdUser']);
    }

    /**
     * Gets query for [[Manager]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManager()
    {
        return $this->hasOne(Manager::className(), ['User_Id' => 'IdUser']);
    }

    /**
     * Gets query for [[Ratings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRatings()
    {
        return $this->hasMany(Rating::className(), ['User_Id' => 'IdUser']);
    }

    /**
     * Gets query for [[Mangas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMangas()
    {
        return $this->hasMany(Manga::className(), ['IdManga' => 'Manga_Id'])->viaTable('rating', ['User_Id' => 'IdUser']);
    }
}
