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
    
    public static function getDictionary_En_us()
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
        ];
        return $Dictionary;
    }
}