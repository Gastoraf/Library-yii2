<?php


namespace app\models\library;

use \yii\base\Model;

class Request8 extends Model
{
  public $chair;
  public $room;
  public $type;
  public $time;
  public $is_dropped;


  public function rules()
  {
    return [
      [['chair', 'room', 'type', 'is_dropped', 'time'], 'required'],
    ];
  }
}
