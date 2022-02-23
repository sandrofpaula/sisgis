<?php

use yii\db\Migration;

/**
 * Class m210610_154153_insert_tb_modulo
 */
class m210610_154153_insert_tb_modulo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%modulo}}', [
            'modulo_descricao','modulo_id'
        ],[
            ['GERAL', 'geral'],
            ['ADMIN', 'admin'],
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        /*echo "m210610_154153_insert_tb_modulo cannot be reverted.\n";

        return false;
        */
        $this->truncateTable('{{%modulo}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210610_154153_insert_tb_modulo cannot be reverted.\n";

        return false;
    }
    */
}
