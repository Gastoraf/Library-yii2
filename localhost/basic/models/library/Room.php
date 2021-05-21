<?php
namespace app\models\library;

use \yii\db\ActiveRecord;

class Room extends ActiveRecord
{
  public function getReader()
  {
    return $this->hasMany(Reader::className(), ['room_id' => 'id']);
  }

  public function getBook()
  {
    return $this->hasMany(Book::className(), ['room_id' => 'id']);
  }
}
