<?php


namespace app\models\library;

use \yii\base\Model;

class Request12 extends Model
{
  public $surnameReader;


  public function rules()
  {
    return [
      [['surnameReader'], 'required'],
    ];
  }
}
