<?php


namespace app\models\library;

use \yii\base\Model;

class Request1 extends Model
{
  public $chair;
  public $room;


  public function rules()
  {
    return [
      [['chair', 'room'], 'required'],
    ];
  }
}
