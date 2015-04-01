<?php

use yii\db\Schema;
use yii\db\Migration;

class m150401_165538_inserts extends Migration
{
    public function up()
    {
        $this->insert('{{%news}}', [
            'title'=>'test_1',
            'text'=>'test text',
            'publicated_at'=>time(),
        ]);
        $this->insert('{{%news}}', [
            'title'=>'test_2',
            'text'=>'test text',
            'subject_id'=>1,
            'publicated_at'=>time(),
        ]);

        $this->insert('{{%subjects}}', [
            'title'=>'subject_1',
        ]);
        $this->insert('{{%subjects}}', [
            'title'=>'subject_2',
        ]);

        return true;
    }

    public function down()
    {

        $this->truncateTable('{{%news}}');
        $this->truncateTable('{{%subjects}}');

        echo "m150401_165538_inserts reverted.\n";

        return true;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
