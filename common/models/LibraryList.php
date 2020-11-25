<?php

namespace common\models;

use Yii;

use common\models\Leitor;
use common\models\Library;

/**
 * This is the model class for table "library_list".
 *
 * @property int $IdList
 * @property string $Name
 *
 * @property Leitor[] $leitors
 * @property Library[] $libraries
 */
class LibraryList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'library_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name'], 'required'],
            [['Name'], 'string', 'max' => 20],
            [['Name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdList' => 'Id List',
            'Name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Leitors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLeitors()
    {
        return $this->hasMany(Leitor::className(), ['PrimaryList_Id' => 'IdList']);
    }

    /**
     * Gets query for [[Libraries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLibraries()
    {
        return $this->hasMany(Library::className(), ['List_Id' => 'IdList']);
    }
}
