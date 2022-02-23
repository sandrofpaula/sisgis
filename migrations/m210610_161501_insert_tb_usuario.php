<?php

use yii\db\Migration;

/**
 * Class m210610_161501_insert_tb_usuario
 */
class m210610_161501_insert_tb_usuario extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%usuario}}', [
            'modulo_cod_fk',
            'perfil_cod_fk',
            'usuario_nome',
            'usuario_login',
            'usuario_email',
            'usuario_tel',
            'usuario_senha',
            'usuario_status'
        ],[
            [
                '1',
                '1',
                'ADMIN', 
                'admin', 
                'admin@wh.com', 
                '92000', 
                'e10adc3949ba59abbe56e057f20f883e', /*Senha: 123456 */
                '1' 
            ],


        ]);
        echo "\n\n\n ..................................\n\n ATENÇÃO \n\n usuário: admin | senha: 123456 \n\n..................................\n\n";
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        /*
        echo "m210610_161501_insert_tb_usuario cannot be reverted.\n";

        return false;
        */
        $this->truncateTable('{{%usuario}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210610_161501_insert_tb_usuario cannot be reverted.\n";

        return false;
    }
    */
}
