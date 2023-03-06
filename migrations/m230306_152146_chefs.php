<?php

use yii\db\Migration;

/**
 * Class m230306_152146_chefs
 */
class m230306_152146_chefs extends Migration
{

    /**
     * @var mixed
     */
    private $table_chefs = 'chefs';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table_chefs, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);

        $this->batchInsert($this->table_chefs, ['name'], [
                ['Повар_1'],
                ['Повар_2'],
                ['Повар_3'],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->table_chefs);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230306_152146_chefs cannot be reverted.\n";

        return false;
    }
    */
}
