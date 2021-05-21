<?php


namespace app\models\library;

use \yii\base\Model;

class Request2 extends Model
{
  public $chair;
  public $room;
  public $type;
  public $is_ten;


  public function rules()
  {
    return [
      [['chair', 'room', 'type', 'is_ten'], 'required'],
    ];
  }
}
