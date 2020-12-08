<?php

use yii\db\Migration;

class m201016_000001_create_user_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'IdUser' => $this->primaryKey(),
            'Username' => $this->string(50)->notNull()->unique(),
            'Email' => $this->string(100)->notNull()->unique(),
            'Genre' => "ENUM('F','M','D') NOT NULL",
            'BirthDate' => $this->date()->notNull(),
            'SrcPhoto' => $this->string(50),
            'Created' => 'DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL',
            'Updated' => 'DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL',
            'SoftDelete' => $this->boolean()->notNull()->defaultValue(0),


            'auth_key' => $this->string(100)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
