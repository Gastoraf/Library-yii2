<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "interlibraryticket".
 *
 * @property int $id
 * @property int $reader_id
 * @property string $author
 * @property string $name
 * @property int $year_of_publishing
 * @property string $order_date
 * @property string $date_of_receiving
 * @property string $return_date
 * @property string|null $returned
 * @property float|null $reimbursed
 *
 * @property Reader $reader
 */
class Interlibraryticket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'interlibraryticket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reader_id', 'author', 'name', 'year_of_publishing', 'order_date', 'date_of_receiving', 'return_date'], 'required'],
            [['reader_id', 'year_of_publishing'], 'integer'],
            [['order_date', 'date_of_receiving', 'return_date'], 'safe'],
            [['returned'], 'string'],
            [['reimbursed'], 'number'],
            [['author', 'name'], 'string', 'max' => 100],
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
            'author' => 'Автор',
            'name' => 'Название',
            'year_of_publishing' => 'Дата публикации',
            'order_date' => 'Дата заказа',
            'date_of_receiving' => 'Дата получения',
            'return_date' => 'Дата возврата',
            'returned' => 'Вернул',
            'reimbursed' => 'Возместил',
        ];
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
