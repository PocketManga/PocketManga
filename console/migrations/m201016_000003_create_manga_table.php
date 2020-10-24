<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%manga}}`.
 */
class m201016_000003_create_manga_table extends Migration
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

        $this->createTable('{{%manga}}', [
            'IdManga' => $this->primaryKey(),
            'Title' => $this->string(100)->notNull(),
            'AlternativeTitle' => $this->string(100),
            'OriginalTitle' => $this->string(100)->notNull(),
            'Status' => $this->boolean()->notNull()->defaultValue(0),
            'OneShot' => $this->boolean()->notNull()->defaultValue(0),
            'R18' => $this->boolean()->notNull()->defaultValue(0),
            'Language' => $this->string(10)->defaultValue('En_us'),
            'SrcImage' => $this->string(50),
            'ReleaseDate' => $this->date()->notNull(),
            'Updated' => 'DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL',
            'Description' => $this->text()->notNull(),
            'Slug' => $this->string(50)->notNull(),
            'Manager_Id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_manga_manager', 'manga', 'Manager_Id', 'manager', 'IdManager');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%manga}}');
    }
}
