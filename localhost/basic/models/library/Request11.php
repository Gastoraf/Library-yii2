<?php

namespace app\models\library;

use \yii\base\Model;

class Request11 extends Model
{
  public $name;


  public function rules()
  {
    return [
      [[ 'name'], 'required'],
    ];
  }
}
