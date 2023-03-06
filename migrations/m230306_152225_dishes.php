<?php

use yii\db\Migration;

/**
 * Class m230306_152225_dishes
 */
class m230306_152225_dishes extends Migration
{
    /**
     * @var mixed
     */
    private $table_dishes = 'dishes';

    /**
     * @var mixed
     */
    private $table_chefs = 'chefs';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table_dishes, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'price' => $this->decimal(10,2)->notNull(),
            'chef_id' => $this->integer()->notNull(),
        ]);

        $this->createIndex('idx-dishes-chef_id', $this->table_dishes, 'chef_id');
        $this->addForeignKey('fk-dishes-chef_id', $this->table_dishes, 'chef_id', $this->table_chefs, 'id');

        $this->batchInsert($this->table_dishes, ['name', 'description', 'price', 'chef_id'], [
                ['Лагман', 'Лагман оч вкусный', 22, 1],
                ['Фунчеза', 'Фунчеза оч вкусная', 33, 2],
                ['Манты', 'Манты оч вкусные', 44, 3],
            ]
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-dishes-chef_id', $this->table_dishes);
        $this->dropIndex('idx-dishes-chef_id', $this->table_dishes);
        $this->dropTable($this->table_dishes);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230306_152225_dishes cannot be reverted.\n";

        return false;
    }
    */
}
