<?php

use yii\db\Migration;

/**
 * Class m220218_165114_create_tb_ponto_turistico
 */
class m220218_165114_create_tb_ponto_turistico extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ponto_turistico}}', [
            'ponto_turistico_cod_pk' => $this->primaryKey(),
            'ponto_turistico_nome' => $this->string(150)->notNull(),
            'ponto_turistico_descricao' => $this->string(1000)->notNull(),
            'ponto_turistico_endereço' => $this->string(1000)->notNull(),
            'ponto_turistico_latitude' => $this->string(100)->notNull(),
            'ponto_turistico_longitude' => $this->string(100)->notNull(),

           
        ], 'engine = InnoDb, charset = utf8');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        /*echo "m220218_165114_create_tb_ponto_turistico cannot be reverted.\n";

        return false;
        */
        $this->dropTable('{{%ponto_turistico}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220218_165114_create_tb_ponto_turistico cannot be reverted.\n";

        return false;
    }
    */
}
