<?php

use yii\db\Migration;

/**
 * Class m210610_160111_insert_tb_perfil
 */
class m210610_160111_insert_tb_perfil extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%perfil}}', [
            'modulo_cod_fk','perfil_descricao','perfil_status'
        ],[
            ['1', 'ADMIN_DEV', '1'],
            ['1', 'ADMIN', '1'],

        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        /*
        echo "m210610_160111_insert_tb_perfil cannot be reverted.\n";

        return false;
        */
        $this->truncateTable('{{%perfil}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210610_160111_insert_tb_perfil cannot be reverted.\n";

        return false;
    }
    */
}
