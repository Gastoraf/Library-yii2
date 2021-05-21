<?php
namespace app\components;

use yii\base\Widget;

/**
* Для отоброжения навбара запросов
*/
class RequestmenuWidjet extends Widget
{

  public function init (){
    parent::init();
  }

  public function run (){
    return $this->render(
      'requestmenu'
    );
  }
}


?>
