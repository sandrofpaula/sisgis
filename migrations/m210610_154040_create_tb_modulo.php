<?php

use yii\db\Migration;

/**
 * Class m210610_154040_create_tb_modulo
 */
class m210610_154040_create_tb_modulo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%modulo}}', [
            'modulo_cod_pk' => $this->primaryKey(),
            'modulo_descricao' => $this->string(300)->notNull(),
            'modulo_id' => $this->string(300)->notNull(),
        ], 'engine = InnoDb, charset = utf8');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        /*echo "m210610_154040_create_tb_modulo cannot be reverted.\n";

        return false;
        */
        $this->dropTable('{{%modulo}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210610_154040_create_tb_modulo cannot be reverted.\n";

        return false;
    }
    */
}
