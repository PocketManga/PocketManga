<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "server".
 *
 * @property int $IdServer
 * @property string $Name
 * @property string $Server
 */
class Server extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'server';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Server'], 'required'],
            [['Name', 'Server'], 'string', 'max' => 10],
            [['Name'], 'unique'],
            [['Server'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdServer' => 'Id Server',
            'Name' => 'Name',
            'Server' => 'Server',
        ];
    }
}
