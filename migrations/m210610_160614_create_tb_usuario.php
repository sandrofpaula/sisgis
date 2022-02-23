<?php

use yii\db\Migration;

/**
 * Class m210610_160614_create_tb_usuario
 */
class m210610_160614_create_tb_usuario extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%usuario}}', [
            'usuario_cod_pk' => $this->primaryKey(),
            'modulo_cod_fk' => $this->integer()->notNull(),
            'perfil_cod_fk' => $this->integer()->notNull(),
            'usuario_nome' => $this->string(150)->notNull(),
            'usuario_login' => $this->string(50)->notNull(),
            'usuario_email' => $this->string(100)->notNull(),
            'usuario_tel' => $this->string(15)->notNull(),
            'usuario_senha' => $this->string(1000)->notNull(),
            'usuario_status' => $this->integer()->notNull(),
           
        ], 'engine = InnoDb, charset = utf8');
        $this->addForeignKey('usuario_modulo_cod_fk02','{{%usuario}}','modulo_cod_fk','{{%modulo}}','modulo_cod_pk');
        $this->addForeignKey('usuario_perfil_cod_fk03','{{%usuario}}','perfil_cod_fk','{{%perfil}}','perfil_cod_pk');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        /*
        echo "m210610_160614_create_tb_usuario cannot be reverted.\n";

        return false;
        */
        $this->dropTable('{{%usuario}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210610_160614_create_tb_usuario cannot be reverted.\n";

        return false;
    }
    */
}
