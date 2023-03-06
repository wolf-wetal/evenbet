<?php

use yii\db\Migration;

/**
 * Class m230306_152238_menus
 */
class m230306_152238_menus extends Migration
{
    /**
     * @var mixed
     */
    private $table_menus = 'menus';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table_menus, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->table_menus);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230306_152238_menus cannot be reverted.\n";

        return false;
    }
    */
}
