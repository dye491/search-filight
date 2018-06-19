<?php

use yii\db\Migration;

/**
 * Class m180618_185548_fill_table_airport
 */
class m180618_185548_fill_table_airport extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('airport', ['code'],[
            ['DME'],
            ['SVX'],
            ['OVB'],
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180618_185548_fill_table_airport cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180618_185548_fill_table_airport cannot be reverted.\n";

        return false;
    }
    */
}
