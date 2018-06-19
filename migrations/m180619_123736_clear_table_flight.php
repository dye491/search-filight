<?php

use yii\db\Migration;

/**
 * Class m180619_123736_clear_table_flight
 */
class m180619_123736_clear_table_flight extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->delete('flight');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180619_123736_clear_table_flight cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180619_123736_clear_table_flight cannot be reverted.\n";

        return false;
    }
    */
}
