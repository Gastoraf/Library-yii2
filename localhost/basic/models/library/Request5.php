<?php

namespace app\models\library;

use \yii\base\Model;

class Request5 extends Model
{
  public $type_of_readers;




  public function rules()
  {
    return [
      [['type_of_readers', 'debt_readers', 'big_debt'], 'required'],
    ];
  }
}
