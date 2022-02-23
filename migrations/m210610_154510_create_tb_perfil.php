<?php

use yii\db\Migration;

/**
 * Class m210610_154510_create_tb_perfil
 */
class m210610_154510_create_tb_perfil extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%perfil}}', [
            'perfil_cod_pk' => $this->primaryKey(),
            'modulo_cod_fk' => $this->integer()->notNull(),
            'perfil_descricao' => $this->string(100)->notNull(),
            'perfil_status' => $this->integer()->notNull(),
        ], 'engine = InnoDb, charset = utf8');
        $this->addForeignKey('perfil_modulo_cod_fk01','{{%perfil}}','modulo_cod_fk','{{%modulo}}','modulo_cod_pk');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        /*echo "m210610_154510_create_tb_perfil cannot be reverted.\n";

        return false;*/
        $this->dropTable('{{%perfil}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210610_154510_create_tb_perfil cannot be reverted.\n";

        return false;
    }
    */
}
