<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%manga}}`.
 */
class m201016_3_create_manga_table extends Migration
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

        $this->createTable('{{%manga}}', [
            'id' => $this->primaryKey(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%manga}}');
    }
}
