<?php
namespace backend\models;

use Yii;
use yii\base\Model;


/**
 * Manga form
 */
class MyAccountForm extends Model
{
    public $Username;
    public $Gender;
    public $BirthDate;
    public $Theme;
    public $Photo;


    public function rules()
    {
        return [
            [['Username','Gender','BirthDate','Theme'], 'required'],
            [['Photo'], 'file'],
            [['BirthDate'], 'safe'],
            [['Theme'], 'boolean'],
            [['Username','Gender'], 'string', 'max' => 20],
        ];
    }

    public function setVariables($Manager)
    {
        if($Manager){
            $this->Username = $Manager->user->Username;
            $this->Gender = $Manager->user->Gender;
            $this->BirthDate = $Manager->user->BirthDate;
            $this->Theme = $Manager->Theme;
        }
    }
}
