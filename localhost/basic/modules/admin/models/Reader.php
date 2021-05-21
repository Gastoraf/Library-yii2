<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "reader".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property int $chair_id
 * @property int $type_id
 * @property int $room_id
 * @property string|null $deprived_of
 * @property string|null $deprived_of_up
 * @property string $registration_date
 * @property string|null $departure_date
 * @property float $should
 *
 * @property InterlibraryTicket[] $interlibraryTickets
 * @property IssuedBooks[] $issuedBooks
 * @property LostBooks[] $lostBooks
 * @property Chair $chair
 * @property Room $room
 * @property Type $type
 */
class Reader extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reader';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'chair_id', 'type_id', 'room_id', 'registration_date', 'should'], 'required'],
            [['chair_id', 'type_id', 'room_id'], 'integer'],
            [['deprived_of', 'deprived_of_up', 'registration_date', 'departure_date'], 'safe'],
            [['should'], 'number'],
            [['name', 'surname'], 'string', 'max' => 100],
            [['chair_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chair::className(), 'targetAttribute' => ['chair_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
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
            'deprived_of' => 'Лишенный с',
            'deprived_of_up' => 'Лишенный до',
            'registration_date' => 'Дата регистрации',
            'departure_date' => 'Дата ухода',
            'should' => 'Должен',
        ];
    }

    /**
     * Gets query for [[InterlibraryTickets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInterlibraryTickets()
    {
        return $this->hasMany(InterlibraryTicket::className(), ['reader_id' => 'id']);
    }

    /**
     * Gets query for [[IssuedBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIssuedBooks()
    {
        return $this->hasMany(IssuedBooks::className(), ['reader_id' => 'id']);
    }

    /**
     * Gets query for [[LostBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLostBooks()
    {
        return $this->hasMany(LostBooks::className(), ['reader_id' => 'id']);
    }

    /**
     * Gets query for [[Chair]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChair()
    {
        return $this->hasOne(Chair::className(), ['id' => 'chair_id']);
    }

    /**
     * Gets query for [[Room]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::className(), ['id' => 'type_id']);
    }
}
