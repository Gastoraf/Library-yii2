<?php


namespace app\models\library;

use \yii\base\Model;

class Request7 extends Model
{
  public $chair;
  public $room;
  public $type;


  public function rules()
  {
    return [
      [['chair', 'room', 'type'], 'required'],
    ];
  }
}
