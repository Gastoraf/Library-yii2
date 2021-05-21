<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Book;
use app\modules\admin\models\BookSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\filters\AccessControl;
use app\models\library\Room;

/**
* BookController implements the CRUD actions for Book model.
*/
class BookController extends Controller
{
  /**
  * @return mixed
  */
  public function behaviors()
  {
    return [
      'access' => [
          'class' => AccessControl::className(),
          'rules' => [
              [
                  'allow' => true,
                  'roles' => ['admin']
              ]
          ]
      ],

      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'delete' => ['POST'],
        ],
      ],
    ];
  }

  /**
  * Lists all Book models.
  * @return mixed
  */
  public function actionIndex()
  {
    $searchModel = new BookSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);
  }

  /**
  * Displays a single Book model.
  * @param integer $id
  * @return mixed
  * @throws NotFoundHttpException if the model cannot be found
  */
  public function actionView($id)
  {
    return $this->render('view', [
      'model' => $this->findModel($id),
    ]);
  }

  /**
  * Creates a new Book model.
  * If creation is successful, the browser will be redirected to the 'view' page.
  * @return mixed
  */
  public function actionCreate()
  {
    $model = new Book();
    $room = Room::find()->all();

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect(['view', 'id' => $model->id]);
    }

    return $this->render('create', [
      'model' => $model,
      'room' => $room,
    ]);
  }

  /**
  * Updates an existing Book model.
  * If update is successful, the browser will be redirected to the 'view' page.
  * @param integer $id
  * @return mixed
  * @throws NotFoundHttpException if the model cannot be found
  */
  public function actionUpdate($id)
  {
    $model = $this->findModel($id);
    $room = Room::find()->all();

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect(['view', 'id' => $model->id]);
    }

    return $this->render('update', [
      'model' => $model,
      'room' => $room,
    ]);
  }

  /**
  * Deletes an existing Book model.
  * If deletion is successful, the browser will be redirected to the 'index' page.
  * @param integer $id
  * @return mixed
  * @throws NotFoundHttpException if the model cannot be found
  */
  public function actionDelete($id)
  {
    $this->findModel($id)->delete();

    return $this->redirect(['index']);
  }

  /**
  * Finds the Book model based on its primary key value.
  * If the model is not found, a 404 HTTP exception will be thrown.
  * @param integer $id
  * @return Book the loaded model
  * @throws NotFoundHttpException if the model cannot be found
  */
  protected function findModel($id)
  {
    if (($model = Book::findOne($id)) !== null) {
      return $model;
    }

    throw new NotFoundHttpException('The requested page does not exist.');
  }
}