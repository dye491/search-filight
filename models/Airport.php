<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "airport".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $country
 */
class Airport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'airport';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country'], 'integer'],
            [['code'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'      => 'ID',
            'code'    => 'Code',
            'name'    => 'Name',
            'country' => 'Country',
        ];
    }

    /**
     * Returns airport model by code
     *
     * @param $code airport code
     * @return null|static
     */
    public function searchByCode($code)
    {
        return Airport::findOne(['code' => $code]);
    }
}
