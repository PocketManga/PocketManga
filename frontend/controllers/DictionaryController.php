<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

/**
 * Site controller
 */
class DictionaryController extends Controller
{
    
    public static function getDictionary_en_US()
    {
        $Dictionary = null;
        $Dictionary = [
            'home' => 'Home',
            'all_manga' => 'All Manga',
            'ongoing' => 'Ongoing',
            'completed' => 'Completed',
            'library' => 'Library',
            'more' => 'More',
            'about' => 'About',
            'contact' => 'Contact',
            'signup' => 'Signup',
            'login' => 'Login',
            'logout' => 'Logout',
            'search' => 'Search',
            'latest-updates' => 'Latest Updates',
            'ranking' => 'Ranking',
            'popular' => 'Popular',
            'show-25' => 'Show mangas: 25 per page',
            'show-50' => 'Show mangas: 50 per page',
            'show-100' => 'Show mangas: 100 per page',
            'uncategorized' => 'Uncategorized',
            'asc' => 'Alfabetic Asc',
            'desc' => 'Alfabetic Desc',
            'both_c_o' => 'Completed and Ongoing',
        ];
        return $Dictionary;
    }
}