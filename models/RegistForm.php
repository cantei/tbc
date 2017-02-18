<?php
namespace app\models;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class RegistForm extends Model
{
    public $tbnumber;
    public $sites;
//    public $email;
//    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            ['username', 'filter', 'filter' => 'trim'],
            ['tbnumber', 'required'],
            ['tbnumber', 'unique', 'targetClass' => '\app\models\Pt', 'message' => 'This tbnumber has already been taken.'],
//            ['username', 'string', 'min' => 2, 'max' => 255],
//
//            ['email', 'filter', 'filter' => 'trim'],
//            ['email', 'required'],
//            ['email', 'email'],
//            ['email', 'string', 'max' => 255],
//            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
//
//            ['password', 'required'],
//            ['password', 'string', 'min' => 6],
//            
//            ['hoscode', 'required'],
//            ['hoscode', 'string', 'min' => 5],
        ];
    }
        public function attributeLabels()
    {
        return [
//            'username' => 'ผู้ใช้งาน (Username)',
//            'password' => 'รหัสผ่าน (password)',
//         
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}
