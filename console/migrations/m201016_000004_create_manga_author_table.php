<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%manga_author}}`.
 */
class m201016_000004_create_manga_author_table extends Migration
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

        $this->createTable('{{%manga_author}}', [
            'Author_Id' => $this->integer()->notNull(),
            'Manga_Id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_manga_author_author', 'manga_author', 'Author_Id', 'author', 'IdAuthor');
        $this->addForeignKey('fk_manga_author_manga', 'manga_author', 'Manga_Id', 'manga', 'IdManga');
        
        $this->addPrimaryKey('pk_manga_author', 'manga_author', ['Author_Id', 'Manga_Id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%manga_author}}');
    }
}
