<?php

use yii\db\Migration;

/**
 * Class m230306_152255_menu_positions
 */
class m230306_152255_menu_positions extends Migration
{

    /**
     * @var mixed
     */
    private $table_menu_positions = 'menu_positions';

    /**
     * @var mixed
     */
    private $table_menus = 'menus';

    /**
     * @var mixed
     */
    private $table_dishes = 'dishes';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table_menu_positions, [
            'id' => $this->primaryKey(),
            'menu_id' => $this->integer()->notNull(),
            'dish_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk_menu_positions_menu_id', $this->table_menu_positions, 'menu_id', $this->table_menus, 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_menu_positions_dish_id', $this->table_menu_positions, 'dish_id', $this->table_dishes, 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_menu_positions_menu_id', $this->table_menu_positions);
        $this->dropForeignKey('fk_menu_positions_dish_id', $this->table_menu_positions);
        $this->dropTable($this->table_menu_positions);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230306_152255_menu_positions cannot be reverted.\n";

        return false;
    }
    */
}
