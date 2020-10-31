<?php
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

// I started here!!
use frontend\models\Manga;
use frontend\models\LibraryList;
use frontend\models\Category;
use yii\data\ArrayDataProvider;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['login', 'signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $Mangas = Manga::find()
            ->innerJoin('chapter', 'manga.IdManga = chapter.Manga_Id')
            ->orderBy(['chapter.ReleaseDate' => SORT_DESC])
            ->all();
        $Categories = Category::find()->all();
        $Option = 'latest-updates';
        $NumberPerPage = 50;
        $PageNumber = 1;
        $NumOfPages = 1;
        
        if($Mangas){
            $floatNum = count($Mangas) / $NumberPerPage;
            $intNum = round($floatNum);
            if($intNum<$floatNum){
                $intNum++;
            }
            $NumOfPages = $intNum;
        }

        return $this->render('index', [
            'Mangas' => $Mangas,
            'Categories' => $Categories,
            'PageNumber' => $PageNumber,
            'NumberPerPage' => $NumberPerPage,
            'NumOfPages' => $NumOfPages,
            'Option' => $Option,
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex2($Option, $NumberPerPage, $PageNumber)
    {
        $Mangas = null;
        switch($Option){
            case 'latest-updates':
                $Mangas = Manga::find()
                    ->innerJoin('chapter', 'manga.IdManga = chapter.Manga_Id')
                    ->orderBy(['chapter.ReleaseDate' => SORT_DESC])
                    ->all();
            break;
            case 'ranking':
                $Mangas = Manga::find()
                ->orderBy(['Ranking' => SORT_DESC])
                ->all();
            break;
            case 'popular':
                $Mangas = Manga::find()->all();
            break;
        }
        $Categories = Category::find()->all();
        
        $NumOfPages = 1;
        
        if($Mangas){
            $floatNum = count($Mangas) / $NumberPerPage;
            $intNum = round($floatNum);
            if($intNum<$floatNum){
                $intNum++;
            }
            $NumOfPages = $intNum;
        }

        return $this->render('index', [
            'Mangas' => $Mangas,
            'Categories' => $Categories,
            'PageNumber' => $PageNumber,
            'NumberPerPage' => $NumberPerPage,
            'NumOfPages' => $NumOfPages,
            'Option' => $Option,
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionOngoing($Option, $NumberPerPage, $PageNumber)
    {
        $Mangas = null;
        switch($Option){
            case 'latest-updates':
                $Mangas = Manga::find()
                    ->innerJoin('chapter', 'manga.IdManga = chapter.Manga_Id')
                    ->where('manga.Status = 0')
                    ->orderBy(['chapter.ReleaseDate' => SORT_DESC])
                    ->all();
            break;
            case 'ranking':
                $Mangas = Manga::find()
                ->where('manga.Status = 0')
                ->orderBy(['Ranking' => SORT_DESC])
                ->all();
            break;
            case 'popular':
                $Mangas = Manga::find()
                ->where('manga.Status = 0')
                ->all();
            break;
        }
        $Categories = Category::find()->all();
        
        $NumOfPages = 1;
        
        if($Mangas){
            $floatNum = count($Mangas) / $NumberPerPage;
            $intNum = round($floatNum);
            if($intNum<$floatNum){
                $intNum++;
            }
            $NumOfPages = $intNum;
        }

        return $this->render('ongoing', [
            'Mangas' => $Mangas,
            'Categories' => $Categories,
            'PageNumber' => $PageNumber,
            'NumberPerPage' => $NumberPerPage,
            'NumOfPages' => $NumOfPages,
            'Option' => $Option,
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionCompleted($Option, $NumberPerPage, $PageNumber)
    {
        $Mangas = null;
        switch($Option){
            case 'latest-updates':
                $Mangas = Manga::find()
                    ->innerJoin('chapter', 'manga.IdManga = chapter.Manga_Id')
                    ->where('manga.Status = 1')
                    ->orderBy(['chapter.ReleaseDate' => SORT_DESC])
                    ->all();
            break;
            case 'ranking':
                $Mangas = Manga::find()
                ->where('manga.Status = 1')
                ->orderBy(['Ranking' => SORT_DESC])
                ->all();
            break;
            case 'popular':
                $Mangas = Manga::find()
                ->where('manga.Status = 1')
                ->all();
            break;
        }
        $Categories = Category::find()->all();
        
        $NumOfPages = 1;
        
        if($Mangas){
            $floatNum = count($Mangas) / $NumberPerPage;
            $intNum = round($floatNum);
            if($intNum<$floatNum){
                $intNum++;
            }
            $NumOfPages = $intNum;
        }

        return $this->render('completed', [
            'Mangas' => $Mangas,
            'Categories' => $Categories,
            'PageNumber' => $PageNumber,
            'NumberPerPage' => $NumberPerPage,
            'NumOfPages' => $NumOfPages,
            'Option' => $Option,
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionSearch($Search, $NumberPerPage, $PageNumber)
    {
        $Search = str_replace("_"," ",$Search);
        $Mangas = Manga::find()
                    ->where('Title LIKE CONCAT("%", "'.$Search.'", "%")')
                    ->orWhere('AlternativeTitle LIKE CONCAT("%", "'.$Search.'", "%")')
                    ->orWhere('OriginalTitle LIKE CONCAT("%", "'.$Search.'", "%")')
                    ->orderBy(['Title' => SORT_ASC])
                    ->all();
        $Categories = Category::find()->all();
        
        $NumOfPages = 1;
        
        if($Mangas){
            $floatNum = count($Mangas) / $NumberPerPage;
            $intNum = round($floatNum);
            if($intNum<$floatNum){
                $intNum++;
            }
            $NumOfPages = $intNum;
        }

        return $this->render('search', [
            'Mangas' => $Mangas,
            'Categories' => $Categories,
            'PageNumber' => $PageNumber,
            'NumberPerPage' => $NumberPerPage,
            'NumOfPages' => $NumOfPages,
            'Search' => $Search,
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionSearch2($Genre, $NumberPerPage, $PageNumber)
    {
        $Category = Category::find($Gente);
        $Mangas = $Category->mangas;
        $Categories = Category::find()->all();
        
        $NumOfPages = 1;
        
        if($Mangas){
            $floatNum = count($Mangas) / $NumberPerPage;
            $intNum = round($floatNum);
            if($intNum<$floatNum){
                $intNum++;
            }
            $NumOfPages = $intNum;
        }

        return $this->render('search', [
            'Mangas' => $Mangas,
            'Categories' => $Categories,
            'PageNumber' => $PageNumber,
            'NumberPerPage' => $NumberPerPage,
            'NumOfPages' => $NumOfPages,
            'Search' => $Category->Name,
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionAllmanga()
    {
        return $this->render('all_manga');
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionLibrary()
    {
        $List = Yii::$app->params['Dictionary']['uncategorized'];
        $Lists = null;
        $Libraries = Yii::$app->user->identity->leitor->libraries;

        if($Libraries){
            foreach($Libraries as $Library){
                $List[] = $Library->list;
            }
        }
        /*
        $Lists = LibraryList::find()
            ->innerJoin('leitor', 'leitor.PrimaryList_Id = library_list.IdList')
            ->where('leitor.IdLeitor', '=', Yii::$app->user->identity->leitor->IdLeitor)
            ->all();
        */
        return $this->render('library',[
            'List' => $List,
            'Lists' => $Lists,
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionLibrary2($List)
    {
        return $this->render('library',[
            'List' => $List,
        ]);
    }
    
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
