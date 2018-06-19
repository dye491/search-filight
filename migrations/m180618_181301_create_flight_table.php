<?php

use yii\db\Migration;

/**
 * Handles the creation of table `flight`.
 */
class m180618_181301_create_flight_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('flight', [
            'id'     => $this->primaryKey(11)->unsigned(),
            'from'   => $this->smallInteger(6)->unsigned()->defaultValue(0),
            'to'     => $this->smallInteger(6)->unsigned()->defaultValue(0),
            'back'   => $this->boolean()->defaultValue(false),
            'start'  => $this->dateTime()->defaultValue(null),
            'stop'   => $this->dateTime()->defaultValue(null),
            'adult'  => $this->tinyInteger(1)->unsigned()->defaultValue(0),
            'child'  => $this->tinyInteger(1)->unsigned()->defaultValue(0),
            'infant' => $this->tinyInteger(1)->unsigned()->defaultValue(0),
            'price'  => $this->decimal(12, 2)->defaultValue(0.0),
        ], 'ENGINE=MyISAM DEFAULT CHARSET=utf8');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('flight');
    }
}
