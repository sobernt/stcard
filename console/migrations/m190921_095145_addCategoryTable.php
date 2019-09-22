<?php

use yii\db\Migration;

/**
 * Class m190921_095145_addCategoryTable
 */
class m190921_095145_addCategoryTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("{{category}}",[
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'description' => $this->text(255)->notNull()
        ]);
        $this->addColumn('{{card}}',
            'category_id',$this->integer());
        $this->createIndex(
            "idx-category-category_id",
            '{{card}}',
            'category_id'
        );
        $this->addForeignKey(
            "fk-card-category_id",
            "{{card}}",
            'category_id',
            '{{category}}',
            'id',
            'CASCADE'
        );
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey("fk-card-category_id","{{card}}");
        $this->dropIndex("idx-category-category_id","{{card}}");
        $this->dropTable("{{category}}");
        return true;
    }
}
