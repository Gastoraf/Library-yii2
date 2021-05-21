<?php

namespace app\models\library;

use \yii\base\Model;

class Request4 extends Model
{
  public $author;
  public $room;
  public $year;
  public $receipt_date;


  public function rules()
  {
    return [
      [['author', 'room', 'year', 'receipt_date'], 'required'],
    ];
  }
}
