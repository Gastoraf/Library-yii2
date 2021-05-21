<?php

namespace app\models\library;

use \yii\base\Model;

class Request10 extends Model
{
  public $name;


  public function rules()
  {
    return [
      [[ 'name'], 'required'],
    ];
  }
}
