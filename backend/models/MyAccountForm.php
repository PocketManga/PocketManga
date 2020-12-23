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
    public $Genre;
    public $BirthDate;
    public $Theme;
    public $Photo;


    public function rules()
    {
        return [
            [['Username','Genre','BirthDate','Theme'], 'required'],
            [['Photo'], 'file'],
            [['BirthDate'], 'safe'],
            [['Theme'], 'boolean'],
            [['Username','Genre'], 'string', 'max' => 20],
        ];
    }

    public function setVariables($Manager)
    {
        if($Manager){
            $this->Username = $Manager->user->Username;
            $this->Genre = $Manager->user->Genre;
            $this->BirthDate = $Manager->user->BirthDate;
            $this->Theme = $Manager->Theme;
        }
    }
}
