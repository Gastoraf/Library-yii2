<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "lostbooks".
 *
 * @property int $id
 * @property int $book_id
 * @property int $reader_id
 * @property int $room_id
 * @property string $lost_date
 * @property float $reimbursed
 *
 * @property Book $book
 * @property Reader $reader
 * @property Room $room
 */
class Lostbooks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lostbooks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_id', 'reader_id', 'room_id', 'lost_date', 'reimbursed'], 'required'],
            [['book_id', 'reader_id', 'room_id'], 'integer'],
            [['lost_date'], 'safe'],
            [['reimbursed'], 'number'],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
            [['reader_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reader::className(), 'targetAttribute' => ['reader_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_id' => 'Книга',
            'reader_id' => 'Читатель',
            'room_id' => 'Комната',
            'lost_date' => 'Дата потери',
            'reimbursed' => 'Возмещено',
        ];
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }

    /**
     * Gets query for [[Reader]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReader()
    {
        return $this->hasOne(Reader::className(), ['id' => 'reader_id']);
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
}
