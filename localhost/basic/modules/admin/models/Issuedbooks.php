<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "issuedbooks".
 *
 * @property int $id
 * @property int $reader_id
 * @property int $book_id
 * @property string $date_of_issue
 * @property string $issued_before
 * @property string|null $returned
 *
 * @property Book $book
 * @property Reader $reader
 */
class Issuedbooks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'issuedbooks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reader_id', 'book_id', 'date_of_issue', 'issued_before'], 'required'],
            [['reader_id', 'book_id'], 'integer'],
            [['date_of_issue', 'issued_before'], 'safe'],
            [['returned'], 'string'],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
            [['reader_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reader::className(), 'targetAttribute' => ['reader_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reader_id' => 'Читатель',
            'book_id' => 'Книга',
            'date_of_issue' => 'Дата взятия',
            'issued_before' => 'Дата возврата',
            'returned' => 'Вернул',
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
}
