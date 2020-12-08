<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%library}}`.
 */
class m201016_000004_create_library_table extends Migration
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

        $this->createTable('{{%library}}', [
            'Leitor_Id' => $this->integer()->notNull(),
            'Manga_Id' => $this->integer()->notNull(),
            'List_Id' => $this->integer(),
        ], $tableOptions);

        $this->addForeignKey('fk_library_leitor', 'library', 'Leitor_Id', 'leitor', 'IdLeitor');
        $this->addForeignKey('fk_library_manga', 'library', 'Manga_Id', 'manga', 'IdManga', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_library_library_list', 'library', 'List_Id', 'library_list', 'IdList');
        
        $this->addPrimaryKey('pk_library', 'library', ['Leitor_Id', 'Manga_Id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%library}}');
    }
}
