<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%favorite}}`.
 */
class m201016_000004_create_favorite_table extends Migration
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

        $this->createTable('{{%favorite}}', [
            'Leitor_Id' => $this->integer()->notNull(),
            'Manga_Id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_favorite_author', 'favorite', 'Leitor_Id', 'leitor', 'IdLeitor');
        $this->addForeignKey('fk_favorite_manga', 'favorite', 'Manga_Id', 'manga', 'IdManga');
        
        $this->addPrimaryKey('pk_favorite', 'favorite', ['Leitor_Id', 'Manga_Id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%favorite}}');
    }
}
