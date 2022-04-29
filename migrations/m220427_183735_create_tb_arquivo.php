<?php

use yii\db\Migration;

/**
 * Class m220427_183735_create_tb_arquivo
 */
class m220427_183735_create_tb_arquivo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%arquivo}}', [
            'arquivo_cod_pk' => $this->primaryKey(),
            //'ponto_turistico_cod_fk' => $this->integer()->notNull(),
            'arquivo_conteudo_nome' => $this->string(255)->notNull(),
            'arquivo_conteudo_tipo' => $this->string(50)->notNull(),
            'arquivo_conteudo_size' => $this->string(255)->notNull(),
            'arquivo_conteudo longblob NOT NULL',
        ], 'engine = InnoDb, charset = utf8');
        //$this->addForeignKey('arquivo_ponto_turistico_cod_fk01','{{%arquivo}}','ponto_turistico_cod_fk','{{%ponto_turistico}}','ponto_turistico_cod_pk');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // echo "m220427_183735_create_tb_arquivo cannot be reverted.\n";

        // return false;
        $this->dropTable('{{%arquivo}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220427_183735_create_tb_arquivo cannot be reverted.\n";

        return false;
    }
    */
}
