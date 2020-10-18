<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%manga_readed}}`.
 */
class m201016_000004_create_manga_readed_table extends Migration
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

        $this->createTable('{{%manga_readed}}', [
            'Leitor_Id' => $this->integer()->notNull(),
            'Manga_Id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_manga_readed_leitor', 'manga_readed', 'Leitor_Id', 'leitor', 'IdLeitor');
        $this->addForeignKey('fk_manga_readed_manga', 'manga_readed', 'Manga_Id', 'manga', 'IdManga');
        
        $this->addPrimaryKey('pk_manga_readed', 'manga_readed', ['Leitor_Id', 'Manga_Id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%manga_readed}}');
    }
}
