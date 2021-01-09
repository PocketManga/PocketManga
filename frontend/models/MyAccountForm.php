<?php
namespace frontend\models;

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
    public $Server;
    public $Theme;
    public $Photo;


    public function rules()
    {
        return [
            [['Username','Gender','BirthDate','Theme','Server'], 'required'],
            [['Photo'], 'file'],
            [['BirthDate'], 'safe'],
            [['Theme'], 'boolean'],
            [['Username','Gender','Server'], 'string', 'max' => 20],
        ];
    }

    public function setVariables($Leitor)
    {
        if($Leitor){
            $this->Username = $Leitor->user->Username;
            $this->Gender = $Leitor->user->Gender;
            $this->BirthDate = $Leitor->user->BirthDate;
            $this->Theme = $Leitor->Theme;
            $this->Server = $Leitor->Server;
        }
    }
}
