<?php

use yii\db\Migration;

/**
 * Handles the creation of table `airport`.
 */
class m180618_181335_create_airport_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('airport', [
            'id'      => $this->primaryKey()->unsigned(),
            'code'    => $this->string(3)->defaultValue(''),
            'name'    => $this->string(64)->defaultValue(''),
            'country' => $this->smallInteger(6)->unsigned()->defaultValue(0),
        ], 'ENGINE=MyISAM DEFAULT CHARSET=utf8');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('airport');
    }
}
