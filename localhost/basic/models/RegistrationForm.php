<?php


namespace app\models;

use Yii;
use yii\base\Model;

class RegistrationForm extends Model
{
    public $username;
    public $password;
    public $repeatPassword;
    public $rememberMe = true;

    public function rules()
    {
        return [
            [['username', 'password', 'repeatPassword'], 'required', 'message' => 'Заполните поле'],
            ['username', 'validateUsername'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if ($this->password !== $this->repeatPassword) {
                $this->addError($attribute, 'Пароли не совпадают.');
            }
        }
    }

    public function register()
    {
      if ($this->validate()) {
          $newUser = new User();
          $newUser->username = $this->username;

          $hash = Yii::$app->getSecurity()->generatePasswordHash($this->password);
          $newUser->password = $hash;

          $newUser->auth_key = "";
          $newUser->save();
          $userRole = Yii::$app->authManager->getRole('admin');
          Yii::$app->authManager->assign($userRole, $newUser->getId());
          return Yii::$app->user->login($newUser, $this->rememberMe ? 3600*24*30 : 0);
      }
      return false;
    }

    public function validateUsername($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = User::findByUsername($this->username);

            if ($user) {
                $this->addError($attribute, 'Пользователь с таким именем уже существует.');
            }
        }
    }
}
