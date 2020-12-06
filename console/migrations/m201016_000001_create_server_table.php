<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%server}}`.
 */
class m201016_000001_create_server_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%server}}', [
            'IdServer' => $this->primaryKey(),
            'Name' => $this->string(10)->notNull()->unique(),
            'Code' => $this->string(10)->notNull()->unique(),
        ], $tableOptions);

        
        $this->insert('{{%server}}', [
            'Name' => 'English',
            'Code' => 'En_us',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%server}}');
    }
}
