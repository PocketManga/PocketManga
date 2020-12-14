<?php
namespace backend\models;

use Yii;
use yii\base\Model;


/**
 * Manga form
 */
class ChapterForm extends Model
{
    public $Number;
    public $Name;
    public $Season;
    public $OneShot;

    public $Images;


    public function rules()
    {
        return [
            [['Number'], 'required'],
            [['Number'], 'number'],
            [['Images'], 'file'],
            [['Season', 'OneShot'], 'integer'],
            [['Name'], 'string', 'max' => 100],
        ];
    }

    public function chapterForm()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        
        return false;
    }

    public function setVariables($Chapter, $ImagesChapter)
    {
        if($Chapter){
            $this->Number = $Chapter->Number;
            $this->Name = $Chapter->Name;
            $this->Season = $Chapter->Season;
            $this->OneShot = $Chapter->OneShot;
        }
    }
}
