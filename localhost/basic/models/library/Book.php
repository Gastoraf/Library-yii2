<?php
namespace app\models\library;

use \yii\db\ActiveRecord;

class Book extends ActiveRecord
{
  public function getRoom()
  {
    return $this->hasOne(Room::className(), ['id' => 'room_id']);
  }

  public function getReceived_books()
  {
    return $this->hasMany(Received_books::className(), ['book_id' => 'id']);
  }

  public function getInterlibrary_ticket()
  {
    return $this->hasMany(Interlibrary_ticket::className(), ['book_id' => 'id']);
  }

  public function getIssuedbooks()
  {
    return $this->hasMany(Issuedbooks::className(), ['book_id' => 'id']);
  }

  public function getLostbooks()
  {
    return $this->hasMany(Lostbooks::className(), ['book_id' => 'id']);
  }

}
