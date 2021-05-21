<?php
namespace app\models\library;

use \yii\db\ActiveRecord;

class Interlibraryticket extends ActiveRecord
{

  public function getReader()
  {
    return $this->hasOne(Reader::className(), ['id' => 'reader_id']);
  }

}
