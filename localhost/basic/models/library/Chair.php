<?php
namespace app\models\library;

use \yii\db\ActiveRecord;

class Chair extends ActiveRecord
{

  public function getReader()
  {
    return $this->hasMany(Reader::className(), ['chair_id' => 'id']);
  }
}
