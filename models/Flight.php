<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flight".
 *
 * @property int $id
 * @property int $from
 * @property int $to
 * @property int $back
 * @property string $start
 * @property string $stop
 * @property int $adult
 * @property int $child
 * @property int $infant
 * @property string $price
 */
class Flight extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'flight';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from', 'to', 'back', 'adult', 'child', 'infant'], 'integer'],
            [['start', 'stop'], 'safe'],
            [['price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from' => 'From',
            'to' => 'To',
            'back' => 'Back',
            'start' => 'Start',
            'stop' => 'Stop',
            'adult' => 'Adult',
            'child' => 'Child',
            'infant' => 'Infant',
            'price' => 'Price',
        ];
    }
}
