<?php
namespace app\components;

use yii\base\Widget;

/**
* Для отображения навбара таблиц
*/
class TablemenuWidjet extends Widget
{

  public function init (){
    parent::init();
  }

  public function run (){
    return $this->render(
      'tablemenu'
    );
  }
}


?>
