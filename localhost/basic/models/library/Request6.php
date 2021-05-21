<?php

namespace app\models\library;

use \yii\base\Model;

class Request6 extends Model
{
  public $book;
  public $room;


  public function rules()
  {
    return [
      [['book', 'room'], 'required'],
    ];
  }
}
