<?php


namespace app\models\library;

use \yii\base\Model;

class Request9 extends Model
{
  public $chair;
  public $room;
  public $type;
  public $time;
  public $nameReader;


  public function rules()
  {
    return [
      [['chair', 'room', 'type', 'nameReader', 'time'], 'required'],
    ];
  }
}
