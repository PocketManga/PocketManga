<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property int $IdLanguage
 * @property string $Name
 * @property string $Language
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Language'], 'required'],
            [['Name', 'Language'], 'string', 'max' => 10],
            [['Name'], 'unique'],
            [['Language'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdLanguage' => 'Id Language',
            'Name' => 'Name',
            'Language' => 'Language',
        ];
    }
}
