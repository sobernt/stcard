<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190910_151447_addCardTable
 */
class m190910_151447_addCardTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        return $this->createTable('{{card}}',[
            'id' => $this->primaryKey(),
            'title' => $this->string(50)->notNull(),
            'description' => $this->text(255)->notNull(),
            'img' => $this->text(255),
            'views' => $this->integer()->notNull()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return$this->dropTable('{{card}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190910_151447_addCardTable cannot be reverted.\n";

        return false;
    }
    */
}
