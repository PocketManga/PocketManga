<?php
namespace frontend\models;

use Yii;
use DateTime;
use yii\base\Model;

use common\models\User;
use common\models\Leitor;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $gender;
    public $birthdate;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            //['gender', 'string'],

            ['birthdate', 'required'],
            ['birthdate', 'safe'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->Username = $this->username;
        $user->Email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        if($this->gender != null){
            $user->Gender = $this->gender;
        }else{
            $user->Gender = 'D';
        }
        $user->BirthDate = (new DateTime($this->birthdate))->format('Y-m-d');
        $user->SrcPhoto = 'PHOTO';
        
        $auth = \Yii::$app->authManager;
        $authorRole = $auth->getRole('leitor');
        $user->save();
        $auth->assign($authorRole, $user->getId());

        $leitor = new Leitor();
        $leitor->MangaShow = '1';
        $leitor->User_Id = $user->getId();

        return $leitor->save() && $this->sendEmail($user);

    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
