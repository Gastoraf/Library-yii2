<?php
namespace app\models\library;

use \yii\db\ActiveRecord;

class Received_books extends ActiveRecord
{
  public function getBook()
  {
    return $this->hasOne(Book::className(), ['id' => 'book_id']);
  }
}
