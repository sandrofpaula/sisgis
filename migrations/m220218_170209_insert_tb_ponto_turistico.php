<?php

use yii\db\Migration;

/**
 * Class m220218_170209_insert_tb_ponto_turistico
 */
class m220218_170209_insert_tb_ponto_turistico extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%ponto_turistico}}', [
            'ponto_turistico_nome',
            'ponto_turistico_descricao',
            'ponto_turistico_endereço',
            'ponto_turistico_latitude',
            'ponto_turistico_longitude'
        ],[
            [
                'Paróquia São Sebastião',
                'A Igreja de São Sebastião é um templo religioso da Arquidiocese de Manaus. Localiza-se na rua 10 de Julho, com sua frente voltada para o Largo de São Sebastião, no Centro do município de Manaus. Inaugurada em 1888 e elevada à categoria de paróquia em 1912, é uma das igrejas mais antigas da cidade. Foi tombada em 1988 como Patrimônio Histórico pelo Conselho Estadual de Defesa do Patrimônio Histórico e Artístico do Amazonas – CEDPHA. Com mais de 130 anos, destaca-se pela devoção de centenas de católicos, pela localização privilegiada e por seu estilo eclético, com alguns elementos de vários diferentes estilos, como o gótico e o neoclássico. Seu interior é marcado por painéis e vitrais europeus, bem ao estilo da época no começo do ciclo da borracha no estado.',
                'Rua 10 de Julho, S/N - Centro, Manaus - AM, 69010-060, Brasil', 
                '-3.129832206302309', 
                '-60.02270863925209'
            ],
            [
                'Palácio Rio Negro',
                'Palácio Rio Negro foi sede do governo e residência oficial do governador. Seu nome original era Palacete Scholz, construído pelo alemão Waldemar Scholz, considerado o "Barão da Borracha". Teve o nome alterado para Palácio Rio Negro em 1918 após autorizada a compra pelo governador do Amazonas, Pedro de Alcântara Bacellar. ',
                'Av. Sete de Setembro, 1546 - Centro, Manaus - AM, 69005-141, Brasil', 
                '-3.1350285620419798', 
                '-60.01688774601535'
            ],
            [
                'Centro Cultural dos Povos da Amazônia',
                'O Centro Cultural dos Povos da Amazônia (CCPA) foi inaugurado em maio de 2007. É um espaço que visa valorizar, difundir e disseminar as informações geradas e produzidas sobre os países da Amazônia Continental, formada por Bolívia, Brasil, Colômbia, Equador, Guiana, Peru, Suriname, Venezuela e a Guiana Francesa.
                O CCPA dispõe de uma cúpula com cerca de 150 lugares e um auditório com capacidade para 70 pessoas, além de uma ampla arena de espetáculos com capacidade para 17 mil pessoas sentadas. Na parte superior externa do prédio são encontrados os registros de ícones rupestres representativos de diversos países amazônicos.',
                'Distrito Industrial I - Av. Silves, 2222 - Crespo, Manaus - AM, 69073-270, Brasil', 
                '-3.1327630909985373', 
                '-59.98738677591855'
            ],
            [
                'Teatro Amazonas',
                'O Teatro Amazonas é um dos mais importantes teatros do Brasil e o principal cartão-postal da cidade de Manaus. Localizado no Largo de São Sebastião, no Centro Histórico, foi inaugurado em 1896 para atender ao desejo da elite amazonense da época, que idealizava a cidade à altura dos grandes centros culturais.[8] É amplamente considerado como um dos mais belos teatros do mundo.
                De estilo renascentista entorno de sua estrutura externa com os detalhes únicos na sua cúpula, tornou-se um dos monumentos mais conhecidos do Brasil e, consequentemente, o maior símbolo cultural de Manaus, e uma das expressões arquitetônicas responsáveis pela fama da cidade de Paris dos Trópicos. Por ser uma obra singular no país e representar o apogeu de Manaus durante o ciclo da borracha, foi tombado como Patrimônio Histórico Nacional pelo IPHAN em 1966. Está localizado mais precisamente na Avenida Eduardo Ribeiro e recebe cerca de 288 mil visitantes ao ano.',
                'Largo de São Sebastião - Centro, Manaus - AM, 69067-080', 
                '-3.130208384544854', 
                '-60.02341446455689'
            ],


        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        /*echo "m220218_170209_insert_tb_ponto_turistico cannot be reverted.\n";

        return false;*/
        $this->truncateTable('{{%ponto_turistico}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220218_170209_insert_tb_ponto_turistico cannot be reverted.\n";

        return false;
    }
    */
}
