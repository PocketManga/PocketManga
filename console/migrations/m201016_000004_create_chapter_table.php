<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%chapter}}`.
 */
class m201016_000004_create_chapter_table extends Migration
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

        $this->createTable('{{%chapter}}', [
            'IdChapter' => $this->primaryKey(),
            'Number' => $this->float(5,5)->notNull(),
            'Name' => $this->string(100),
            'ReleaseDate' => 'DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL',
            'Updated' => 'DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL',
            'Season' => $this->integer(),
            'OneShot' => $this->boolean()->notNull()->defaultValue(0),
            'SrcFolder' => $this->string(50),
            'Slug' => $this->string(50)->notNull(),
            'Manga_Id' => $this->integer()->notNull(),
            'Manager_Id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_chapter_manga', 'chapter', 'Manga_Id', 'manga', 'IdManga');
        $this->addForeignKey('fk_chapter_manager', 'chapter', 'Manager_Id', 'manager', 'IdManager');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%chapter}}');
    }
}
