<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%report}}`.
 */
class m201016_000005_create_report_table extends Migration
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

        $this->createTable('{{%report}}', [
            'IdReport' => $this->primaryKey(),
            'SubjectMatter' => $this->text()->notNull(),
            'Description' => $this->string(100)->notNull(),
            'SrcImage' => $this->string(50)->notNull(),
            'Resolved' => $this->boolean()->notNull()->defaultValue(0),
            'Created' => 'DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL',
            'Manga_Id' => $this->integer(),
            'Chapter_Id' => $this->integer(),
            'Leitor_Id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_report_manga', 'report', 'Manga_Id', 'manga', 'IdManga');
        $this->addForeignKey('fk_report_chapter', 'report', 'Chapter_Id', 'chapter', 'IdChapter');
        $this->addForeignKey('fk_report_leitor', 'report', 'Leitor_Id', 'leitor', 'IdLeitor');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%report}}');
    }
}
