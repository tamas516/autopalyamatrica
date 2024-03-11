<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%autok}}`.
 */
class m240305_131410_create_autok_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%autok}}', [
            'auto_id' => $this->integer(11)->notNull(),
            'gyarto' => $this->string(512)->notNull(),
            'tipus' => $this->string(512)->notNull(),
            'rendszam' => $this->string(512)->notNull(),
            'gyartasi_ev' => $this->integer(11)->notNull(),
        ]);

        $this->addPrimaryKey('PK_autok_auto_id','{{%autok}}','auto_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%autok}}');
    }
}
