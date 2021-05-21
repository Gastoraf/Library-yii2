<?php


namespace app\models\library;

use \yii\base\Model;

class Request13 extends Model
{
  public $surnameReader;
  public $time;


  public function rules()
  {
    return [
      [['surnameReader', 'time'], 'required'],
    ];
  }
}
