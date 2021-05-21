<?php

namespace app\controllers;

use app\models\RegistrationForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
class LibraryController extends Controller
{
  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'only' => ['logout'],
        'rules' => [
          [
            'actions' => ['admin'],
            'allow' => true,
            'roles' => ['admin'],
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
  * Login action.
  *
  * @return Response|string
  */
  public function actionLogin()
  {
    if (!Yii::$app->user->isGuest) {
      return $this->goHome();
    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
      return $this->goBack();
    }

    $model->password = '';
    return $this->render('login', [
      'model' => $model,
    ]);
  }

  public function actionRegistration()
  {
    if (!Yii::$app->user->isGuest) {
      return $this->goHome();
    }

    $model = new RegistrationForm();
    if ($model->load(Yii::$app->request->post()) && $model->register()) {
      return $this->goBack();
    }

    $model->password = '';
    return $this->render('registration', [
      'model' => $model,
    ]);
  }

  /**
  * Logout action.
  *
  * @return Response
  */
  public function actionLogout()
  {
    Yii::$app->user->logout();

    return $this->goHome();
  }

  public function actionMain()
  {
      return $this->render('main');

  }

}
