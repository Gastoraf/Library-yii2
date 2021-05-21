<?php


namespace app\modules\admin\controllers;

use \yii\web\Controller;
use \yii\filters\AccessControl;

class AdminController extends Controller
{
  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'rules' => [
          [
            //'actions' => ['admin', 'admin/book'],
            'allow' => true,
            'roles' => ['admin']
          ]
        ]
      ]
    ];
  }
}
