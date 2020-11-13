<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%list}}`.
 */
class m201016_000001_create_library_list_table extends Migration
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

        $this->createTable('{{%library_list}}', [
            'IdList' => $this->primaryKey(),
            'Name' => $this->string(20)->notNull()->unique(),
        ], $tableOptions);

        $this->insert('{{%library_list}}', [
            'Name' => 'Uncategorized',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%list}}');
    }
}
