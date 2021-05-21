<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "chair".
 *
 * @property int $id
 * @property string $name
 *
 * @property Reader[] $readers
 */
class Chair extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chair';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 20],
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
     * Gets query for [[Readers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReaders()
    {
        return $this->hasMany(Reader::className(), ['chair_id' => 'id']);
    }
}
