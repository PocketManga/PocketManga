<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%chapter_readed}}`.
 */
class m201016_000005_create_chapter_readed_table extends Migration
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

        $this->createTable('{{%chapter_readed}}', [
            'Leitor_Id' => $this->integer()->notNull(),
            'Chapter_Id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_chapter_readed_author', 'chapter_readed', 'Leitor_Id', 'leitor', 'IdLeitor');
        $this->addForeignKey('fk_chapter_readed_chapter', 'chapter_readed', 'Chapter_Id', 'chapter', 'IdChapter');
        
        $this->addPrimaryKey('pk_chapter_readed', 'chapter_readed', ['Leitor_Id', 'Chapter_Id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%chapter_readed}}');
    }
}
