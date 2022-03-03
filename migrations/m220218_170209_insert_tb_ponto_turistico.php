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
            [
                'Sumaúma Park Shopping',
                'Shopping espaçoso com grande variedade de lojas e restaurantes, além de um espaço casual com boliche e piscina.',
                'Av. Noel Nutels, 2112 - Cidade Nova, Manaus - AM, 69095-000, Brasil', 
                '-3.0306701597741648', 
                '-59.977083022229'
            ],
            [
                'Manauara Shopping',
                'Muita gente, quando viaja, prefere deixar de lado os shoppings, pois pensa que em todas as cidades o que se vê é sempre igual, as mesmas lojas, os mesmos restaurantes. Há um fundo de verdade nesse pensamento, mas o Manauara foge à regra geral - é claro que por lá você encontrará as mais importantes marcas do país, mas o diferencial desse shopping é possuir uma pequena floresta em seu interior. Vale a pena tomar um sorvete e curtir o ar fresquinho das árvores, sabendo que, na verdade, você está num shopping. ',
                'Av. Mário Ypiranga, 1300 - Adrianópolis, Manaus - AM, 69053-165', 
                '-3.1042437', 
                '-60.01230349999999'
            ],
            [
                'Manaus Plaza Shopping & Convenções',
                'Situado na Av Djalma Batista, o local foi por anos point de encontro como o Bar do Boi, em 1991, em 2002 transformado em Tvlâdia Mall, um ambiente de confraternização entre amigos, um simples centro de compras.
                Hoje o empreendimento conta com mais de 80 lojas nos setores de comércio, alimentação, lazer e serviços, um fluxo médio de 750 mil visitantes por mês, sendo uma média de 25 mil por dia, um centro de convenções com opção de montagem de salas modulares para atender de 50 a 3000 pessoas sentadas em eventos de diferentes vertentes e um estacionamento de nove andares.',
                'Av. Djalma Batista, 2100 - Chapada, Manaus - AM, 69050-010', 
                '-3.0972984775652885', 
                '-60.023911375585534'
            ],
            [
                'Amazonas Shopping',
                'O Amazonas Shopping Center é um centro de compras com mais de 25 anos de funcionamento em Manaus. Com uma estrutura moderna, o Amazonas Shopping é referência nas áreas de moda, lazer, cinema, serviços e gastronomia, além de proporcionar os melhores eventos de Manaus.Foi inaugurado em 07 de novembro de 1991 como o primeiro shopping de Manaus, passou pela primeira expansão em novembro de 2000. Isso representou ainda mais modernidade, conforto e segurança para os clientes do shopping, já habituados com o padrão de qualidade do Amazonas. Em 2007, o Amazonas Shopping Center passou a ser administrado pela brMalls, impulsionando ainda mais o seu desenvolvimento. Após um longo período mantendo seu projeto arquitetônico inaugural, o Shopping se modernizou completamente, tanto estruturalmente quanto em mix de lojas.',
                'Av. Djalma Batista, 482 - Parque 10 de Novembro, Manaus - AM, 69050-010', 
                '-3.10354531587904', 
                '-60.011976296319766'
            ],
            [
                'Millennium Shopping',
                'Inaugurado em 7 de dezembro de 2004, com área bruta lócavel de 13.839m². 6 milhões de frequentadores no ano, o Millennium Shopping é um complexo empresarial, comercial e hoteleiro formado por um shopping center e três torres. Localizado no coração dos negócios de Manaus, o Millennium Shopping possui 100 lojas, quatro âncoras e oito salas de cinema tipo stadium da rede Cinépolis, sendo três salas 3D e uma Macro X, todas com instalações de última geração.',
                'Av. Djalma Batista, 1661 - Chapada, Manaus - AM, 69050-010', 
                '-3.104402775782296', 
                '-60.01189023100503'
            ],
            
            [
                'Shopping Ponta Negra',
                'O Shopping Ponta Negra foi inaugurado em 7 de agosto de 2013, com a proposta de levar ao público de Manaus uma inovadora e diferenciada concepção de centro de compras e lazer. Desde então, esse moderno espaço vem sendo reconhecido como referência nas áreas de moda, serviços e entretenimento, além de dispor de um segmento de gastronomia que atende aos mais exigentes gostos.',
                'Av. Coronel Teixeira, 5705 - Santo Agostinho, Manaus - AM, 69036-725, Brasil', 
                '-3.0850374', 
                '-60.0724762'
            ],
            [
                'Museu da Amazônia - MUSA',
                'Um museu vivo.Que segredos escondem as águas do rio Negro? Que constelações as diversas etnias indígenas amazônicas identificam no céu? Como um mosquito vê a floresta ao seu redor? Seria possível “enxergar” o ar que se move entre a copa das árvores?A complexidade e a rica diversidade social e biológica da Amazônia suscitam perguntas. Para algumas, as respostas já existem. Para outras, as descobriremos. Imaginar perguntas e buscar respostas é o que propõe o Musa.Para cumprir esse objetivo, será preciso ir ao encontro da natureza. Os sentidos, como o tato e a visão, não são os únicos aliados na jornada – microscópios, lupas e microcâmeras podem colaborar. Muitas vezes, será preciso sair da posição de observador, ser pássaros ou formigas, para entender como um pássaro vê ou o modo como uma formiga percebe o mundo. Como? É o que queremos saber.Este é o convite que o Musa faz a seus visitantes: ver a floresta com um novo olhar.',
                'Av. Margarita, 6305 - Cidade de Deus, Manaus - AM, 69099-415, Brasil', 
                '-3.007211', 
                '-59.93993099999999'
            ],
            [
                'CIGSs Zoo',
                'O Centro de Instrução de Guerra na Selva, CIGS foi criado em 02 de março de 1964, pelo decreto Nr 53649, tendo como seu primeiro Comandante o então Major de Artilharia Jorge Teixeira de Oliveira, o TEIXEIRÃO.Até junho de 1969, o CIGS foi subordinado ao Grupamento de Elementos de Fronteira. Em fevereiro de 1970, passou a ser subordinado à Diretoria de Especialização e Extensão (DEE). Em Outubro de 1970, passou a designar-se Centro de Operações na Selva e Ações de Comandos (COSAC), com a missão de ministrar além dos cursos de Operações na Selva e de Ações de Comandos. Em 1978, retornou à sua antiga designação, deixando de ministrar o curso de Ações de Comandos. Em setembro de 1982, o CIGS passou à subordinação do Comando Militar da Amazônia, permanecendo vinculado tecnicamente à DEE, Atual DETMil.',
                'Av. São Jorge, 750 - São Jorge, Manaus - AM, 69033-000, Brasil', 
                '-3.1036933', 
                '-60.04442109999999'
            ],

            [
                'Bosque da Ciência - INPA - Instituto Nacional de Pesquisa da Amazônia',
                'O Bosque da Ciência é um espaço localizado na região central-leste da capital amazonense e tem como propósito fazer a divulgação de pesquisas científicas e impulsionar o contato dos visitantes com a fauna e a flora locais. Você aprenderá um pouco mais sobre a região amazônica e ver animais como peixe-boi, jacarés e outros. Todos esses resgatados quando filhotes por pesquisadores. A entrada custa R$ 5 e para crianças com menos de 10 anos ela é gratuita!',
                'R. Bem-Ti-VI, s/n - Petrópolis, Manaus - AM, 69060-001, Brasil', 
                '-3.097479260854774', 
                '-59.987812'
            ],
            [
                'Parque Municipal do Mindu',
                'O parque é lugar perfeito para quem quiser mais contato com a natureza, mesmo no meio da cidade. Ideal para quem vai levar as crianças. Lá você vai se deparar com pequenos mamíferos como pacas, cotias e com sorte quem sabe até uma preguiça. Aves como tucanos e araras também podem ser observadas com facilidade por ali. Entrada franca!',
                'Parque Municipal do Mindu - R. Domingos José Martins, S/n - Parque Dez de Novembro, Manaus - AM, 69098-257, Brasil', 
                '-3.0790875', 
                '-60.0080645'
            ],
            [
                'Mercado Municipal Adolpho Lisboa',
                'O Mercado Municipal Adolpho Lisboa é um dos principais pontos turísticos de Manaus para quem curte arquitetura. Devido à sua importância, o prédio foi tombado em 1987 pelo Iphan. Também conhecido como Mercadão, lá você encontra um pouco de tudo, artesanato, comidas e vários outros produtos típicos da região.',
                'Mercado Adolpho Lisboa - R. dos Barés - Centro, Manaus - AM, 69005-020, Brasil', 
                '-3.1397427', 
                '-60.0237259'
            ],
            [
                'Praia da Lua',
                'Eleita como a melhor praia de Manaus pela Lonely Planet, a Praia da Lua merece a sua atenção e é mais uma boa dica de o que fazer em Manaus. Antes de qualquer coisa, vale ressaltar que ela leva este nome devido ao formato de lua que seu banco de areia forma sobre o Rio Negro. Caso você deseje ver de perto esta beleza, priorize visitar a região em épocas de maré alta, uma vez que em tempos de maré baixa a faixa de areia não costuma existir, o que atrapalha o passeio. Se possível, tente ir pra lá durante a semana, visto que, aos sábados e domingos, o movimento pode ser intenso. Além disso, não precisa se preocupar com estrutura: há barracas e quiosques servindo o melhor da culinária amazonense. Esses pontos de apoio também disponibilizam guarda-sol e cadeiras.Mas, ó, aqui vai um detalhe relevante: ela fica a 23 km de Manaus e é acessada somente de barco/lancha. Sendo assim, para visitá-la, basta ir até a Marina do Davi e adquirir o seu ingresso. Partiu?',
                'Praia da Lua, Manaus - AM, Brasil', 
                '-3.0331532', 
                '-60.1328533'
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
