<?php
namespace app\models\library;

use \yii\db\ActiveRecord;

class Lostbooks extends ActiveRecord
{
  public function getBook()
  {
    return $this->hasOne(Book::className(), ['id' => 'book_id']);
  }

  public function getReader()
  {
    return $this->hasOne(Reader::className(), ['id' => 'reader_id']);
  }
}
