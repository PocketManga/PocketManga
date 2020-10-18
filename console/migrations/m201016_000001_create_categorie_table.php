<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%categorie}}`.
 */
class m201016_000001_create_categorie_table extends Migration
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

        $this->createTable('{{%categorie}}', [
            'IdCategorie' => $this->primaryKey(),
            'Name' => $this->string(20)->notNull()->unique(),
            'Language' => $this->string(20)->notNull()->defaultValue('En_us'),
            'Slug' => $this->string(20)->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categorie}}');
    }
}
