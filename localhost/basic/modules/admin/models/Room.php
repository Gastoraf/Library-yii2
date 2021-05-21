<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property int $id
 * @property string $name
 *
 * @property Book[] $books
 * @property LostBooks[] $lostBooks
 * @property Reader[] $readers
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
        ];
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['room_id' => 'id']);
    }

    /**
     * Gets query for [[LostBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLostBooks()
    {
        return $this->hasMany(LostBooks::className(), ['room_id' => 'id']);
    }

    /**
     * Gets query for [[Readers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReaders()
    {
        return $this->hasMany(Reader::className(), ['room_id' => 'id']);
    }
}
