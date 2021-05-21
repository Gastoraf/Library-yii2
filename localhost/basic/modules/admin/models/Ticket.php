<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "ticket".
 *
 * @property int $id
 * @property int $schedule_id
 * @property string $buy_datetime
 * @property string $fio_owner
 * @property string $gender_owner
 * @property int $age_owner
 * @property int|null $luggage_number
 *
 * @property Schedule $schedule
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['schedule_id', 'buy_datetime', 'fio_owner', 'gender_owner', 'age_owner'], 'required'],
            [['schedule_id', 'age_owner', 'luggage_number'], 'integer'],
            [['buy_datetime'], 'safe'],
            [['fio_owner'], 'string', 'max' => 255],
            [['gender_owner'], 'string', 'max' => 7],
            [['schedule_id'], 'exist', 'skipOnError' => true, 'targetClass' => Schedule::className(), 'targetAttribute' => ['schedule_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'schedule_id' => 'Место отправления',
            'buy_datetime' => 'Дата/время покупки',
            'fio_owner' => 'ФИО',
            'gender_owner' => 'Пол',
            'age_owner' => 'Возраст',
            'luggage_number' => 'Места для багажа',
        ];
    }

    /**
     * Gets query for [[Schedule]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedule()
    {
        return $this->hasOne(Schedule::className(), ['id' => 'schedule_id']);
    }
}
