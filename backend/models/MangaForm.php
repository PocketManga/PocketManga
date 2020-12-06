<?php
namespace backend\models;

use Yii;
use yii\base\Model;

use backend\models\Manager;

/**
 * Manga form
 */
class MangaForm extends Model
{
    public $Title;
    public $AlternativeTitle;
    public $OriginalTitle;
    public $Status;
    public $OneShot;
    public $R18;
    public $Server;
    public $SrcImage;
    public $ReleaseDate;
    public $Description;

    public $Category;
    public $Author;


    public function rules()
    {
        return [
            [['Title', 'OriginalTitle', 'ReleaseDate', 'Description'], 'required'],
            [['Status', 'OneShot', 'R18'], 'integer'],
            [['ReleaseDate'], 'safe'],
            [['Description'], 'string'],
            [['Title', 'AlternativeTitle', 'OriginalTitle'], 'string', 'max' => 100],
            [['Server'], 'string', 'max' => 10],
            [['SrcImage'], 'string', 'max' => 50],
            ['Category', 'each', 'rule' => ['integer']],
            ['Author', 'each', 'rule' => ['integer']],
        ];
    }

    public function mangaForm()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        
        return false;
    }
}
