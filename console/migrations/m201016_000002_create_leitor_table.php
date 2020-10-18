<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%leitor}}`.
 */
class m201016_000002_create_leitor_table extends Migration
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

        $this->createTable('{{%leitor}}', [
            'IdLeitor' => $this->primaryKey(),
            'Theme' => $this->boolean()->notNull()->defaultValue(1),
            'MangaShow' => "ENUM('1','2','3') NOT NULL",
            'ChapterShow' => $this->boolean()->notNull()->defaultValue(1),
            'LibraryShow' => "ENUM('1','2','3') NOT NULL",
            'LastVisit' => 'DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL',
            'Language' => $this->string(10)->notNull()->defaultValue('En_us'),
            'MangaLanguage' => $this->string(10)->notNull()->defaultValue('En_us'),
            'PrimaryList_Id' => $this->integer(),
            'User_Id' => $this->integer()->notNull()->unique(),
        ], $tableOptions);

        $this->addForeignKey('fk_leitor_list', 'leitor', 'PrimaryList_Id', 'list', 'IdList');
        $this->addForeignKey('fk_leitor_user', 'leitor', 'User_Id', 'user', 'IdUser');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%leitor}}');
    }
}
