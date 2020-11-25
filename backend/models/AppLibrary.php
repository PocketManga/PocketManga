<?php

namespace backend\models;

use Yii;

use backend\models\App;
use common\models\Manga;
/**
 * This is the model class for table "app_library".
 *
 * @property int $App_Id
 * @property int $Manga_Id
 * @property string $List
 *
 * @property App $app
 * @property Manga $manga
 */
class AppLibrary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_library';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['App_Id', 'Manga_Id', 'List'], 'required'],
            [['App_Id', 'Manga_Id'], 'integer'],
            [['List'], 'string'],
            [['App_Id', 'Manga_Id'], 'unique', 'targetAttribute' => ['App_Id', 'Manga_Id']],
            [['App_Id'], 'exist', 'skipOnError' => true, 'targetClass' => App::className(), 'targetAttribute' => ['App_Id' => 'IdApp']],
            [['Manga_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Manga::className(), 'targetAttribute' => ['Manga_Id' => 'IdManga']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'App_Id' => 'App ID',
            'Manga_Id' => 'Manga ID',
            'List' => 'List',
        ];
    }

    /**
     * Gets query for [[App]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApp()
    {
        return $this->hasOne(App::className(), ['IdApp' => 'App_Id']);
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
