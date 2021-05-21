<?php

namespace app\controllers;

use app\models\library\Reader;
use app\models\library\ReaderSearch;
use app\models\library\Book;
use app\models\library\Room;
use app\models\library\Chair;
use app\models\library\Type;
use app\models\library\Issuedbooks;
use app\models\library\Interlibraryticket;
use app\models\library\Received_books;
use app\models\library\Lostbooks;
use app\models\library\Request1;
use app\models\library\Request2;
use app\models\library\Request3;
use app\models\library\Request4;
use app\models\library\Request5;
use app\models\library\Request6;
use app\models\library\Request7;
use app\models\library\Request8;
use app\models\library\Request9;
use app\models\library\Request10;
use app\models\library\Request11;
use app\models\library\Request12;
use app\models\library\Request13;

use yii\data\ActiveDataProvider;
use yii\db\Query;
use Yii;
use yii\filters\AccessControl;
use \yii\web\Controller;
use yii\data\Pagination;


class RequestsController extends Controller
{

  public function behaviors()
  {
      return [
          'access' => [
              'class' => AccessControl::className(),
              'rules' => [
                  [
                      'allow' => true,
                      'roles' => ['admin', 'user']
                  ]
              ]
          ]
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



  public function actionRequest1()
  {
    $filterModel = new Request1();

    $chairs = Chair::find()->all();
    $rooms = Room::find()->all();
    $readers = Reader::find()
    ->orderBy(['(registration_date)' => SORT_ASC])
    ->all();

    $chairsArr = ['Не выбрано' => 'Не выбрано'];
    $roomsArr = ['Не выбрано' => 'Не выбрано'];

    foreach ($chairs as $chair)
    $chairsArr[$chair["id"]] = $chair["name"];

    foreach ($rooms as $room)
    $roomsArr[$room["id"]] = $room["name"];

    $query = Reader::find()->with('chair', 'room', 'type');

    if($filterModel->load(Yii::$app->request->post())) {
      $conditions = [];

      if($filterModel->chair != "Не выбрано")
      $conditions["chair_id"] = $filterModel->chair;

      if($filterModel->room != "Не выбрано")
      $conditions["room_id"] = $filterModel->room;

      $query = Reader::find()->with('chair', 'room', 'type')->where($conditions);
    }

    $searchModel = new ReaderSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $query);

    return $this->render('request1', [
      'readers' => $readers,
      'chairsArr' => $chairsArr,
      'roomsArr' => $roomsArr,
      'filterModel'=>$filterModel,
      'dataProvider' => $dataProvider,
      'searchModel' => $searchModel
    ]);
  }



  public function actionRequest2()
  {
    $filterModel = new Request2();

    $chairs = Chair::find()->all();
    $rooms = Room::find()->all();
    $types = Type::find()->all();
    $readers = Reader::find()
    ->orderBy(['(registration_date)' => SORT_ASC])
    ->all();

    $chairsArr = ['Не выбрано' => 'Не выбрано'];
    $roomsArr = ['Не выбрано' => 'Не выбрано'];
    $typesArr = ['Не выбрано' => 'Не выбрано'];

    foreach ($chairs as $chair)
    $chairsArr[$chair["id"]] = $chair["name"];

    foreach ($rooms as $room)
    $roomsArr[$room["id"]] = $room["name"];

    foreach ($types as $type)
    $typesArr[$type["id"]] = $type["name"];

    $today = date("Y-m-d");

    $readerQuery = (new Query())->select('reader_id')->from('issuedbooks')
    ->where(['<', 'issued_before', $today])
    ->andWhere(['=', 'returned', 'Нет']);

    $query = Reader::find()->with('chair', 'room', 'type')->where(['id' => $readerQuery]);

    if($filterModel->load(Yii::$app->request->post())) {
      $conditions = [];

      if($filterModel->chair != "Не выбрано")
      $conditions["chair_id"] = $filterModel->chair;

      if($filterModel->room != "Не выбрано")
      $conditions["room_id"] = $filterModel->room;

      if($filterModel->type != "Не выбрано")
      $conditions["type_id"] = $filterModel->type;

      if($filterModel->is_ten == 1){
        $today_10 = date('Y-m-d', strtotime($thisDate. " - 10 day"));
        $ifQuery = (new Query())->select('reader_id')->from('issuedbooks')->where(['<', 'issued_before', $today_10])
        ->andWhere(['=', 'returned', 'Нет']);
      }

      if($filterModel->is_ten == 0){
        $today = date("Y-m-d");
        $ifQuery = (new Query())->select('reader_id')->from('issuedbooks')->where(['<', 'issued_before', $today])
        ->andWhere(['=', 'returned', 'Нет']);
      }

      $query = Reader::find()->with('chair', 'room', 'type')->where($conditions)->andWhere(['<','deprived_of','2021-12-31'])
      ->andWhere(['id' => $ifQuery]);

    }
    $count = $query->count();

    $pagination = new Pagination([
      'defaultPageSize' => 10,
      'totalCount' =>$query->count(),
    ]);

    $readers = $query->offset($pagination->offset)
    ->limit($pagination->limit)
    ->all();

    return $this->render('request2', [
      'readers' => $readers,
      'pagination' => $pagination,
      'chairsArr' => $chairsArr,
      'roomsArr' => $roomsArr,
      'typesArr' => $typesArr,
      'filterModel'=>$filterModel,
      'count' => $count
    ]);
  }



  public function actionRequest3()
  {
    $filterModel = new Request3();

    $chairs = Chair::find()->all();
    $rooms = Room::find()->all();
    $readers = Reader::find()->all();
    $books = Book::find()->all();

    $chairsArr = ['Не выбрано' => 'Не выбрано'];
    $roomsArr = ['Не выбрано' => 'Не выбрано'];

    foreach ($chairs as $chair)
    $chairsArr[$chair["id"]] = $chair["name"];

    foreach ($rooms as $room)
    $roomsArr[$room["id"]] = $room["name"];

    $topBooks = (new Query())->select('book_id', 'reader_id')
    ->from('issuedbooks')
    ->groupBy('book_id')
    ->orderBy(['COUNT(*)' => SORT_DESC])
    ->limit(20);

    $query = Book::find()->with('room', 'issuedbooks')->innerJoin(['u' => $topBooks], 'u.book_id = id');

    //dropDownList
    if($filterModel->load(Yii::$app->request->post())) {
      $conditions = [];

      if($filterModel->chair != "Не выбрано"){
        $condition["chair_id"] = $filterModel->chair;
        $query = Reader::find()->with('chair')->where($condition);

        $topBooks = (new Query())->select('book_id', 'reader_id')
        ->from('issuedbooks')->innerJoin(['q' => $query], 'q.id = reader_id')
        ->groupBy('book_id')
        ->orderBy(['COUNT(*)' => SORT_DESC])
        ->limit(2);
      }


      if($filterModel->room != "Не выбрано")
      $conditions["room_id"] = $filterModel->room;

      $query = Book::find()->with('room', 'issuedbooks')->where($conditions)->innerJoin(['u' => $topBooks], 'u.book_id = id');
    }
    $count = $query->count();

    $pagination = new Pagination([
      'defaultPageSize' => 10,
      'totalCount' =>$query->count(),
    ]);

    $books = $query->offset($pagination->offset)
    ->limit($pagination->limit)
    ->all();

    return $this->render('request3', [
      'books' => $books,
      'pagination' => $pagination,
      'chairsArr' => $chairsArr,
      'roomsArr' => $roomsArr,
      'filterModel'=>$filterModel,
      'count' => $count
    ]);
  }



  public function actionRequest4()
  {
    $filterModel = new Request4();

    $books = Book::find()->all();
    $rooms = Room::find()->all();

    $authorsArr = ['Не выбрано' => 'Не выбрано'];
    $roomsArr = ['Не выбрано' => 'Не выбрано'];
    $yearsArr = ['Не выбрано' => 'Не выбрано'];

    foreach ($books as $book)
    $authorsArr[$book["author"]] = $book["author"];

    foreach ($rooms as $room)
    $roomsArr[$room["id"]] = $room["name"];

    $numYear = date("y") - 18;
    for  ($i = 1; $i <= $numYear; $i++){
      $yearsArr[2018 + $i] = 2018 + $i;
    }


    $lost_books = (new Query())->select('book_id')
    ->from('lostbooks');

    $received_books = (new Query())->select('book_id')
    ->from('received_books');

    $query = Book::find()->with('room');
    $query2 = Book::find()->with('room')->innerJoin(['l_b' => $lost_books], 'l_b.book_id = book.id');

    if($filterModel->load(Yii::$app->request->post())) {
      $conditions = [];

      if($filterModel->room != "Не выбрано")
      $conditions["room_id"] = $filterModel->room;

      if($filterModel->author != "Не выбрано")
      $conditions["author"] = $filterModel->author;

      if($filterModel->receipt_date != "Не выбрано")
      $conditions["receipt_date"] = (int)$filterModel->receipt_date;

      if($filterModel->year != "0")
      $conditions["year_of_publishing"] = $filterModel->year;

      $query = Book::find()->where($conditions)
      ->with('room')->joinWith('lostbooks');
    }

    $count = $query->count();

    $pagination = new Pagination([
      'defaultPageSize' => 10,
      'totalCount' =>$query->count(),
    ]);

    $books = $query->offset($pagination->offset)
    ->limit($pagination->limit)
    ->all();

    return $this->render('request4', [
      'books' => $books,
      'pagination' => $pagination,
      'yearsArr' => $yearsArr,
      'roomsArr' => $roomsArr,
      'authorsArr' => $authorsArr,
      'filterModel'=>$filterModel,
      'count' => $count
    ]);
  }



  public function actionRequest5()
  {
    $filterModel = new Request5();

    $rooms = Room::find()->all();

    $readers = Reader::find()->limit(1);

    $query = Room::find()->innerJoin(['reader' => $readers], 'room.id = reader.room_id');

    if($filterModel->load(Yii::$app->request->post())) {
      $conditions = [];

      if($filterModel->type_of_readers == "Самое большое число читателей"){

        $readers->groupBy('room_id')->orderBy(['(COUNT(*))' => SORT_DESC]);
        $query = Room::find()->groupBy('room_id')->innerJoin(['reader' => $readers], 'room.id = reader.room_id');

      } elseif ($filterModel->type_of_readers == "Самое маленькое число читателей"){

        $readers->groupBy('room_id')->orderBy(['(COUNT(*))' => SORT_ASC]);
        $query = Room::find()->innerJoin(['reader' => $readers], 'room.id = reader.room_id');

      } elseif ($filterModel->type_of_readers == "Самое большое число читателей-задолжников") {

        $readers->groupBy('room_id')->orderBy(['(COUNT(*))' => SORT_DESC])->andWhere(['>','should', 0]);
        $query = Room::find()->innerJoin(['reader' => $readers], 'room.id = reader.room_id');

      } elseif ($filterModel->type_of_readers == "Самое маленькое число читателей-задолжников") {

        $readers->groupBy('room_id')->orderBy(['(COUNT(*))' => SORT_ASC])->andWhere(['>','should', 0]);
        $query = Room::find()->innerJoin(['reader' => $readers], 'room.id = reader.room_id');

      } elseif ($filterModel->type_of_readers == "Cамая большая сумма задолженности"){

        $readers->groupBy('room_id')->orderBy(['(should)' => SORT_ASC])->andWhere(['>','should', 0]);
        $query = Room::find()->innerJoin(['reader' => $readers], 'room.id = reader.room_id');

      }
    }
    $count = $query->count();

    $pagination = new Pagination([
      'defaultPageSize' => 10,
      'totalCount' =>$query->count(),
    ]);

    $rooms = $query->offset($pagination->offset)
    ->limit($pagination->limit)
    ->all();

    return $this->render('request5', [
      'rooms' => $rooms,
      'pagination' => $pagination,
      'chairsArr' => $chairsArr,
      'roomsArr' => $roomsArr,
      'typesArr' => $typesArr,
      'filterModel'=>$filterModel,
      'count' => $count
    ]);
  }



  public function actionRequest6()
  {
    $filterModel = new Request6();

    $rooms = Room::find()->all();
    $books = Book::find()->all();

    $roomsArr = ['Не выбрано' => 'Не выбрано'];
    $booksArr = ['Не выбрано' => 'Не выбрано'];

    foreach ($rooms as $room)
    $roomsArr[$room["id"]] = $room["name"];

    $query = Book::find()->with('room')->andWhere(['=', 'name', '']);

    //dropDownList
    if($filterModel->load(Yii::$app->request->post())) {

      if($filterModel->book != "")
      $query = Book::find()->with('room')->andWhere(['=', 'name', $filterModel->book]);


      if($filterModel->room != "Не выбрано")
      $query = $query->andWhere(['=', 'room_id', $filterModel->room]);
    }
    $count = $query->count();

    $pagination = new Pagination([
      'defaultPageSize' => 10,
      'totalCount' =>$query->count(),
    ]);

    $books = $query->offset($pagination->offset)
    ->limit($pagination->limit)
    ->all();

    return $this->render('request6', [
      'books' => $books,
      'pagination' => $pagination,
      'booksArr' => $booksArr,
      'roomsArr' => $roomsArr,
      'filterModel'=>$filterModel,
      'count' => $count
    ]);
  }



  public function actionRequest7()
  {
    $filterModel = new Request7();

    $chairs = Chair::find()->all();
    $rooms = Room::find()->all();
    $types = Type::find()->all();
    $readers = Reader::find()
    ->orderBy(['(registration_date)' => SORT_ASC])
    ->all();

    $chairsArr = ['Не выбрано' => 'Не выбрано'];
    $roomsArr = ['Не выбрано' => 'Не выбрано'];
    $typesArr = ['Не выбрано' => 'Не выбрано'];

    foreach ($chairs as $chair)
    $chairsArr[$chair["id"]] = $chair["name"];

    foreach ($rooms as $room)
    $roomsArr[$room["id"]] = $room["name"];

    foreach ($types as $type)
    $typesArr[$type["id"]] = $type["name"];

    $readers = Reader::find()->limit(1);

    $query = Room::find()->innerJoin(['reader' => $readers], 'room.id = reader.room_id');

    $colMounth = Reader::find()
    ->andWhere(['>','DATEDIFF(`deprived_of_up`,`deprived_of`)', 60]);

    $query = Reader::find()->with('chair', 'room', 'type')
    ->innerJoin(['r1' => $colMounth], 'r1.id = reader.id');

    if($filterModel->load(Yii::$app->request->post())) {
      $conditions = [];

      if($filterModel->chair != "Не выбрано")
      $conditions["reader.chair_id"] = $filterModel->chair;

      if($filterModel->room != "Не выбрано")
      $conditions["reader.room_id"] = $filterModel->room;

      if($filterModel->type != "Не выбрано")
      $conditions["reader.type_id"] = $filterModel->type;

      $query = Reader::find()->with('chair', 'room', 'type')->where($conditions)->innerJoin(['r1' => $colMounth], 'r1.id = reader.id');

    }
    $count = $query->count();

    $pagination = new Pagination([
      'defaultPageSize' => 10,
      'totalCount' =>$query->count(),
    ]);

    $readers = $query->offset($pagination->offset)
    ->limit($pagination->limit)
    ->all();

    return $this->render('request7', [
      'readers' => $readers,
      'pagination' => $pagination,
      'chairsArr' => $chairsArr,
      'roomsArr' => $roomsArr,
      'typesArr' => $typesArr,
      'filterModel'=>$filterModel,
      'count' => $count
    ]);
  }



  public function actionRequest8()
  {
    $filterModel = new Request8();

    $chairs = Chair::find()->all();
    $rooms = Room::find()->all();
    $types = Type::find()->all();
    $readers = Reader::find()
    ->orderBy(['(registration_date)' => SORT_ASC])
    ->all();

    $chairsArr = ['Не выбрано' => 'Не выбрано'];
    $roomsArr = ['Не выбрано' => 'Не выбрано'];
    $typesArr = ['Не выбрано' => 'Не выбрано'];

    foreach ($chairs as $chair)
    $chairsArr[$chair["id"]] = $chair["name"];

    foreach ($rooms as $room)
    $roomsArr[$room["id"]] = $room["name"];

    foreach ($types as $type)
    $typesArr[$type["id"]] = $type["name"];

    $startDate = date("Y-m-00");
    $endDate = date("Y-m-31");

    $query = Reader::find()->with('chair', 'room', 'type')
    ->where(['>', 'departure_date', $startDate])
    ->andWhere(['<=', 'departure_date', $endDate]);

    if($filterModel->load(Yii::$app->request->post())) {
      $conditions = [];

      if($filterModel->chair != "Не выбрано")
      $conditions["chair_id"] = $filterModel->chair;

      if($filterModel->room != "Не выбрано")
      $conditions["room_id"] = $filterModel->room;

      if($filterModel->type != "Не выбрано")
      $conditions["type_id"] = $filterModel->type;

      if($filterModel->is_dropped == 1){

        if($filterModel->time == 'Месяц'){

          $startDate = date("Y-m-01");
          $endDate = date("Y-m-31");

          $query = Reader::find()->with('chair', 'room', 'type')
          ->where(['>', 'departure_date', $startDate])
          ->andWhere(['<=', 'departure_date', $endDate])
          ->andWhere($conditions);

        } elseif ($filterModel->time == 'Семестр') {

          if(date('m')<7){
            $startDate = date("Y-01-00");
            $endDate = date("Y-06-31");

            $query = Reader::find()->with('chair', 'room', 'type')
            ->where(['>', 'departure_date', $startDate])
            ->andWhere(['<=', 'departure_date', $endDate])
            ->andWhere($conditions);
          } else {
            $startDate = date("Y-07-00");
            $endDate = date("Y-12-31");

            $query = Reader::find()->with('chair', 'room', 'type')
            ->where(['>', 'departure_date', $startDate])
            ->andWhere(['<=', 'departure_date', $endDate])
            ->andWhere($conditions);
          }

        } elseif ($filterModel->time == 'Год') {
          $startDate = date("Y-00-00");
          $endDate = date("Y-12-31");

          $query = Reader::find()->with('chair', 'room', 'type')
          ->where(['>', 'departure_date', $startDate])
          ->andWhere(['<=', 'departure_date', $endDate])
          ->andWhere($conditions);
        }

      }

      if($filterModel->is_dropped == 0){

        if($filterModel->time == 'Месяц'){

          $startDate = date("Y-m-01");
          $endDate = date("Y-m-31");

          $query = Reader::find()->with('chair', 'room', 'type')
          ->where(['>', 'registration_date', $startDate])
          ->andWhere(['<=', 'registration_date', $endDate])
          ->andWhere($conditions);

        } elseif ($filterModel->time == 'Семестр') {

          if(date('m')<7){
            $startDate = date("Y-01-00");
            $endDate = date("Y-06-31");

            $query = Reader::find()->with('chair', 'room', 'type')
            ->where(['>', 'registration_date', $startDate])
            ->andWhere(['<=', 'registration_date', $endDate])
            ->andWhere($conditions);

          } else {
            $startDate = date("Y-07-00");
            $endDate = date("Y-12-31");

            $query = Reader::find()->with('chair', 'room', 'type')
            ->where(['>', 'registration_date', $startDate])
            ->andWhere(['<=', 'registration_date', $endDate])
            ->andWhere($conditions);
          }

        } elseif ($filterModel->time == 'Год') {
          $startDate = date("Y-00-00");
          $endDate = date("Y-12-31");

          $query = Reader::find()->with('chair', 'room', 'type')
          ->where(['>', 'registration_date', $startDate])
          ->andWhere(['<=', 'registration_date', $endDate])
          ->andWhere($conditions);
        }
      }

    }
    $count = $query->count();

    $pagination = new Pagination([
      'defaultPageSize' => 10,
      'totalCount' =>$query->count(),
    ]);

    $readers = $query->offset($pagination->offset)
    ->limit($pagination->limit)
    ->all();

    return $this->render('request8', [
      'readers' => $readers,
      'pagination' => $pagination,
      'chairsArr' => $chairsArr,
      'roomsArr' => $roomsArr,
      'typesArr' => $typesArr,
      'filterModel'=>$filterModel,
      'count' => $count
    ]);
  }



  public function actionRequest9()
  {
    $filterModel = new Request9();

    $chairs = Chair::find()->all();
    $rooms = Room::find()->all();
    $types = Type::find()->all();
    $readers = Reader::find()
    ->orderBy(['(registration_date)' => SORT_ASC])
    ->all();

    $chairsArr = ['Не выбрано' => 'Не выбрано'];
    $roomsArr = ['Не выбрано' => 'Не выбрано'];
    $typesArr = ['Не выбрано' => 'Не выбрано'];

    foreach ($chairs as $chair)
    $chairsArr[$chair["id"]] = $chair["name"];

    foreach ($rooms as $room)
    $roomsArr[$room["id"]] = $room["name"];

    foreach ($types as $type)
    $typesArr[$type["id"]] = $type["name"];

    $query = Reader::find()->with('chair', 'room', 'type')->andWhere(['=', 'name', '']);


    if($filterModel->load(Yii::$app->request->post())) {
      $conditions = [];

      if($filterModel->chair != "Не выбрано")
      $conditions["chair_id"] = $filterModel->chair;

      if($filterModel->room != "Не выбрано")
      $conditions["room_id"] = $filterModel->room;

      if($filterModel->type != "Не выбрано")
      $conditions["type_id"] = $filterModel->type;

      if($filterModel->nameReader != ""){

        if($filterModel->time == 'Месяц'){

          $startDate = date("Y-m-01");
          $endDate = date("Y-m-31");

        } elseif ($filterModel->time == 'Семестр') {

          if(date('m')<7){
            $startDate = date("Y-01-00");
            $endDate = date("Y-06-31");
          } else {
            $startDate = date("Y-07-00");
            $endDate = date("Y-12-31");
          }

        } elseif ($filterModel->time == 'Год') {
          $startDate = date("Y-00-00");
          $endDate = date("Y-12-31");
        }

        $query = Reader::find()->with('chair', 'room', 'type')
        ->where($conditions)
        ->andWhere(['=', 'name', $filterModel->nameReader]);

      }

    }

    $issued_books = Issuedbooks::find()
    ->innerJoin(['r' => $query], 'r.id = reader_id')
    ->groupBy('book_id')
    ->where(['>', 'date_of_issue', $startDate])
    ->andWhere(['<=', 'date_of_issue', $endDate]);

    $books = Book::find()
    ->innerJoin(['i_b' => $issued_books], 'i_b.book_id = book.id');

    $issued_books =
    Issuedbooks::find()
    ->innerJoin(['r' => $query], 'r.id = reader_id')
    ->groupBy('book_id')
    ->where(['>', 'date_of_issue', $startDate])
    ->andWhere(['<=', 'date_of_issue', $endDate])
    ->andWhere(['=','returned', 'Нет']);

    $bookNow = Book::find()
    ->innerJoin(['i_b' => $issued_books], 'i_b.book_id = book.id');

    $count = $query->count();

    $pagination = new Pagination([
      'defaultPageSize' => 10,
      'totalCount' =>$books->count(),
    ]);

    $pagination2 = new Pagination([
      'defaultPageSize' => 10,
      'totalCount' =>$bookNow->count(),
    ]);

    $readers = $query->all();

    $bookNow = $bookNow->offset($pagination2->offset)
    ->limit($pagination2->limit)
    ->all();

    $books = $books->offset($pagination->offset)
    ->limit($pagination->limit)
    ->all();

    return $this->render('request9', [
      'bookNow' => $bookNow,
      'issued_books' => $issued_books,
      'readers' => $readers,
      'books' => $books,
      'pagination' => $pagination,
      'pagination2' => $pagination2,
      'chairsArr' => $chairsArr,
      'roomsArr' => $roomsArr,
      'typesArr' => $typesArr,
      'filterModel'=>$filterModel,
      'count' => $count,
      'count2' => $count2
    ]);
  }



  public function actionRequest10()
  {
    $filterModel = new Request10();

    $rooms = Room::find()->all();
    $books = Book::find()->all();

    $query = Book::find()->with('room', 'issuedbooks')->andWhere(['=', 'name', 'Антихрупкость']);

    if($filterModel->load(Yii::$app->request->post())) {

      if($filterModel->name != "")
      $query = Book::find()->with('room', 'issuedbooks')->andWhere(['=', 'name', $filterModel->name]);

    }
    $count = $query->count();

    $pagination = new Pagination([
      'defaultPageSize' => 10,
      'totalCount' =>$query->count(),
    ]);

    $books = $query->offset($pagination->offset)
    ->limit($pagination->limit)
    ->all();

    return $this->render('request10', [
      'books' => $books,
      'pagination' => $pagination,
      'filterModel'=>$filterModel,
      'count' => $count
    ]);
  }



  public function actionRequest11()
  {
    $filterModel = new Request11();

    $chairs = Chair::find()->all();
    $rooms = Room::find()->all();
    $readers = Reader::find()
    ->orderBy(['(registration_date)' => SORT_ASC])
    ->all();

    $query = Reader::find()->with('chair', 'room', 'type')->andWhere(['=', 'name', 'Алексей']);

    $query2 = Reader::find()->with('chair', 'room', 'type')->limit(1);

    $readers2 = $query2->all();

    if($filterModel->load(Yii::$app->request->post())) {

      if($filterModel->name != ""){

        $books = Book::find()
        ->andWhere(['=', 'name', $filterModel->name]);

        $issued_books =
        Issuedbooks::find()
        ->innerJoin(['b' => $books], 'b.id = book_id')
        ->andWhere(['=','returned', 'Нет']);

        $query = Reader::find()->with('chair', 'room', 'type')
        ->innerJoin(['i_b' => $issued_books], 'i_b.reader_id = reader.id');

        $issued_books1 =
        Issuedbooks::find()
        ->innerJoin(['b' => $books], 'b.id = book_id')
        ->andWhere(['=','returned', 'Нет'])
        ->orderBy(['(issued_before)' => SORT_DESC]);

        $query2 = Reader::find()->with('chair', 'room', 'type')
        ->innerJoin(['i_b' => $issued_books], 'i_b.reader_id = reader.id')->limit(1);

        $readers2 = $query2->all();

      }

    }
    $count = $query->count();

    $pagination = new Pagination([
      'defaultPageSize' => 10,
      'totalCount' =>$query->count(),
    ]);

    $readers = $query->offset($pagination->offset)
    ->limit($pagination->limit)
    ->all();

    return $this->render('request11', [
      'readers' => $readers,
      'readers2' => $readers2,
      'pagination' => $pagination,
      'chairsArr' => $chairsArr,
      'roomsArr' => $roomsArr,
      'filterModel'=>$filterModel,
      'count' => $count
    ]);
  }



  public function actionRequest12()
  {
    $filterModel = new Request12();

    $chairs = Chair::find()->all();
    $rooms = Room::find()->all();
    $types = Type::find()->all();
    $books = Book::find()->andWhere(['=', 'name', ''])->all();


    $query = Reader::find()->with('chair', 'room', 'type')->andWhere(['=', 'name', '']);


    if($filterModel->load(Yii::$app->request->post())) {

      if($filterModel->surnameReader != ""){
        $query = Reader::find()->with('chair', 'room', 'type', 'lostbooks')
        ->andWhere(['=', 'surname', $filterModel->surnameReader]);

        $lost_books = Lost_books::find()->innerJoin(['r' => $query], 'r.id = reader_id');

        $books = Book::find()->innerJoin(['l_b' => $lost_books], 'l_b.book_id = book.id')->all();
      }

    }
    $count = $query->count();

    $pagination = new Pagination([
      'defaultPageSize' => 10,
      'totalCount' =>$query->count(),
    ]);

    $readers = $query->offset($pagination->offset)
    ->limit($pagination->limit)
    ->all();

    return $this->render('request12', [
      'bookNow' => $bookNow,
      'issued_books' => $issued_books,
      'readers' => $readers,
      'books' => $books,
      'pagination' => $pagination,
      'filterModel'=>$filterModel,
      'count' => $count,
      'count2' => $count2
    ]);
  }



  public function actionRequest13()
  {
    $filterModel = new Request13();

    $chairs = Chair::find()->all();
    $rooms = Room::find()->all();
    $types = Type::find()->all();

    $query = Interlibraryticket::find();


    if($filterModel->load(Yii::$app->request->post())) {

      if($filterModel->time == 'Месяц'){

        $startDate = date("Y-m-01");
        $endDate = date("Y-m-31");

      } elseif ($filterModel->time == 'Семестр') {

        if(date('m')<7){
          $startDate = date("Y-01-00");
          $endDate = date("Y-06-31");
        } else {
          $startDate = date("Y-07-00");
          $endDate = date("Y-12-31");
        }

      } elseif ($filterModel->time == 'Год') {
        $startDate = date("Y-00-00");
        $endDate = date("Y-12-31");
      }

      $query = Interlibraryticket::find()
      ->where(['>', 'date_of_receiving', $startDate])
      ->andWhere(['<=', 'date_of_receiving', $endDate]);

    }
    $count = $query->count();

    $pagination = new Pagination([
      'defaultPageSize' => 10,
      'totalCount' =>$query->count(),
    ]);

    $books = $query->offset($pagination->offset)
    ->limit($pagination->limit)
    ->all();

    return $this->render('request13', [
      'bookNow' => $bookNow,
      'issued_books' => $issued_books,
      'readers' => $readers,
      'books' => $books,
      'pagination' => $pagination,
      'filterModel'=>$filterModel,
      'count' => $count,
      'count2' => $count2
    ]);
  }

}
