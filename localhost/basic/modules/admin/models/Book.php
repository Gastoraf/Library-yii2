<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $author
 * @property string $name
 * @property int $room_id
 * @property int $year_of_publishing
 * @property int $row_number
 * @property int $rack_number
 * @property int $shelf_number
 * @property int $receipt_date
 * @property int|null $total
 *
 * @property Room $room
 * @property IssuedBooks[] $issuedBooks
 * @property LostBooks[] $lostBooks
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author', 'name', 'room_id', 'year_of_publishing', 'row_number', 'rack_number', 'shelf_number', 'receipt_date'], 'required'],
            [['room_id', 'year_of_publishing', 'row_number', 'rack_number', 'shelf_number', 'receipt_date', 'total'], 'integer'],
            [['author'], 'string', 'max' => 100],
            [['name'], 'string', 'max' => 50],
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
            'author' => 'Автор',
            'name' => 'Название',
            'room_id' => 'Комната',
            'year_of_publishing' => 'Дата публикации',
            'row_number' => 'Номер ряда',
            'rack_number' => 'Номер стойки',
            'shelf_number' => 'Номер полки',
            'receipt_date' => 'Дата поступления',
            'total' => 'Количество',
        ];
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
     * Gets query for [[IssuedBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIssuedBooks()
    {
        return $this->hasMany(IssuedBooks::className(), ['book_id' => 'id']);
    }

    /**
     * Gets query for [[LostBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLostBooks()
    {
        return $this->hasMany(LostBooks::className(), ['book_id' => 'id']);
    }
}
