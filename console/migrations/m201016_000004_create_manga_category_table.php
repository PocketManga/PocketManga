<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%manga_category}}`.
 */
class m201016_000004_create_manga_category_table extends Migration
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

        $this->createTable('{{%manga_category}}', [
            'Category_Id' => $this->integer()->notNull(),
            'Manga_Id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_manga_category_category', 'manga_category', 'Category_Id', 'category', 'IdCategory', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_manga_category_manga', 'manga_category', 'Manga_Id', 'manga', 'IdManga', 'CASCADE', 'CASCADE');
        
        $this->addPrimaryKey('pk_manga_category', 'manga_category', ['Category_Id', 'Manga_Id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%manga_category}}');
    }
}
