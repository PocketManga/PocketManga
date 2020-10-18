<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%language}}`.
 */
class m201016_000001_create_language_table extends Migration
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

        $this->createTable('{{%language}}', [
            'IdLanguage' => $this->primaryKey(),
            'Name' => $this->string(10)->notNull()->unique(),
            'Language' => $this->string(10)->notNull()->unique(),
        ], $tableOptions);

        
        $this->insert('{{%language}}', [
            'Name' => 'English',
            'Language' => 'En_us',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%language}}');
    }
}
