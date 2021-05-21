<?php
namespace app\models\library;

use \yii\db\ActiveRecord;

class Issuedbooks extends ActiveRecord
{

  public function getBook()
  {
    return $this->hasOne(Book::className(), ['book_id' => 'id']);
  }

  public function getReader()
  {
    return $this->hasOne(Reader::className(), ['reader_id' => 'id']);
  }

}
