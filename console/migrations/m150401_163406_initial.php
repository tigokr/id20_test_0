<?php

use yii\db\Schema;
use yii\db\Migration;

class m150401_163406_initial extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%news}}', [
            'id'=>Schema::TYPE_INTEGER .' NOT NULL PRIMARY KEY AUTOINCREMENT',
            'publicated_at'=>Schema::TYPE_DATETIME . ' NOT NULL',
            'title'=>Schema::TYPE_TEXT . ' NOT NULL',
            'text'=>Schema::TYPE_TEXT . ' NOT NULL',
            'subject_id'=>Schema::TYPE_INTEGER,
        ], $tableOptions);

        $this->createTable('{{%subjects}}', [
            'id'=>Schema::TYPE_INTEGER .' NOT NULL PRIMARY KEY AUTOINCREMENT',
            'title'=>Schema::TYPE_TEXT . ' NOT NULL',
        ], $tableOptions);

        return true;
    }

    public function down()
    {

        $this->dropTable('{{%news}}');
        $this->dropTable('{{%subjects}}');

        echo "m150401_163406_initial reverted.\n";

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
