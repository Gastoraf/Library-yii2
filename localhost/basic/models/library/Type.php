<?php
namespace app\models\library;

use \yii\db\ActiveRecord;

class Type extends ActiveRecord
{
  public function getReader()
  {
    return $this->hasMany(Reader::className(), ['type_id' => 'id']);
  }
}
