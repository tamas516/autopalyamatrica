<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%matricak}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%autok}}`
 */
class m240307_104604_create_matricak_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%matricak}}', [
            'matrica_id' => $this->integer(11)->notNull(),
            'auto_id' => $this->integer(11),
            'lejarat' => $this->date()->notNull(),
            'matrica_tipus' => $this->string(512)->notNull(),
        ]);

        $this->addPrimaryKey('PK_matricak_matrica_id','{{%matricak}}','matrica_id');

        // creates index for column `auto_id`
        $this->createIndex(
            '{{%idx-matricak-auto_id}}',
            '{{%matricak}}',
            'auto_id'
        );

        // add foreign key for table `{{%autok}}`
        $this->addForeignKey(
            '{{%fk-matricak-auto_id}}',
            '{{%matricak}}',
            'auto_id',
            '{{%autok}}',
            'auto_id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%autok}}`
        $this->dropForeignKey(
            '{{%fk-matricak-auto_id}}',
            '{{%matricak}}'
        );

        // drops index for column `auto_id`
        $this->dropIndex(
            '{{%idx-matricak-auto_id}}',
            '{{%matricak}}'
        );

        $this->dropTable('{{%matricak}}');
    }
}
