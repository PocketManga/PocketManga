<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m201016_000005_create_comment_table extends Migration
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

        $this->createTable('{{%comment}}', [
            'IdComment' => $this->primaryKey(),
            'Comment' => $this->text()->notNull(),
            'Updated' => 'DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL',
            'Created' => 'DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL',
            'User_Id' => $this->integer()->notNull(),
            'Chapter_Id' => $this->integer(),
            'Manga_Id' => $this->integer(),
            'CommentDad_Id' => $this->integer(),
        ], $tableOptions);

        $this->addForeignKey('fk_comment_user', 'comment', 'User_Id', 'user', 'IdUser');
        $this->addForeignKey('fk_comment_chapter', 'comment', 'Chapter_Id', 'chapter', 'IdChapter');
        $this->addForeignKey('fk_comment_manga', 'comment', 'Manga_Id', 'manga', 'IdManga');
        $this->addForeignKey('fk_comment_comment', 'comment', 'CommentDad_Id', 'comment', 'IdComment');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comment}}');
    }
}
