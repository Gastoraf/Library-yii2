<?php
namespace app\models\library;

use \yii\db\ActiveRecord;

class Reader extends ActiveRecord
{

  public static function tableName()
  {
      return 'reader';
  }

  public function getIssuedbooks()
  {
    return $this->hasMany(Issuedbooks::className(), ['reader_id' => 'id']);
  }

  public function getInterlibraryticket()
  {
    return $this->hasMany(Interlibraryticket::className(), ['reader_id' => 'id']);
  }

  public function getLostbooks()
  {
    return $this->hasMany(Lostbooks::className(), ['reader_id' => 'id']);
  }

  public function getChair()
  {
    return $this->hasOne(Chair::className(), ['id' => 'chair_id']);
  }

  public function getRoom()
  {
    return $this->hasOne(Room::className(), ['id' => 'room_id']);
  }

  public function getType()
  {
    return $this->hasOne(Type::className(), ['id' => 'type_id']);
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
      return [
          'id' => 'ID',
          'name' => 'Имя',
          'surname' => 'Фамилия',
          'chair_id' => 'Кафедра',
          'type_id' => 'Категория',
          'room_id' => 'Комната',
          'deprived_of' => 'Лишен с',
          'deprived_of_up' => 'Лишен до',
          'registration_date' => 'Дата регистрации',
          'departure_date' => 'Дата ухода',
          'should' => 'Должен'

      ];
  }


}
