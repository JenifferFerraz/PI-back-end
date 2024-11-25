<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Perguntas
        $questions = [
            ['id' => 1, 'question' => 'Seus dados são estruturados (tabelas com linhas e colunas) ou não estruturados (documentos, texto livre, etc.)?', 'type' => 'data_structure'],
            ['id' => 2, 'question' => 'Qual é o volume dos seus dados?', 'type' => 'data_structure'],
            ['id' => 3, 'question' => 'Que tipo de operações são mais frequentes?', 'type' => 'operations_type'],
            ['id' => 4, 'question' => 'Você precisa de suporte para alta escalabilidade horizontal?', 'type' => 'scalability'],
            ['id' => 5, 'question' => 'Qual dessas características é mais importante para você?', 'type' => 'usability'],
            ['id' => 6, 'question' => 'Você prefere uma solução que seja fácil de usar e configurar?', 'type' => 'usability'],
            ['id' => 7, 'question' => 'É crucial que suas operações de leitura e escrita sejam extremamente rápidas?', 'type' => 'operations_type'],
            ['id' => 8, 'question' => 'Você precisa de um sistema que ofereça replicação e distribuição de dados facilmente?', 'type' => 'scalability'],
            ['id' => 9, 'question' => 'Você precisa de um sistema que possa lidar eficientemente com grandes volumes de dados distribuídos?', 'type' => 'scalability'],
            ['id' => 10, 'question' => 'Você está disposto a pagar por uma solução de banco de dados?', 'type' => 'usability'],
            ['id' => 11, 'question' => 'Você está disposto a pagar por uma solução de banco de dados?', 'type' => 'usability'],
            ['id' => 12, 'question' => 'Você está disposto a pagar por uma solução de banco de dados?', 'type' => 'usability'],
            ['id' => 13, 'question' => 'Você está disposto a pagar por uma solução de banco de dados?', 'type' => 'usability'],
            ['id' => 14, 'question' => 'Você está disposto a pagar por uma solução de banco de dados?', 'type' => 'usability'],
            ['id' => 15, 'question' => 'Você está disposto a pagar por uma solução de banco de dados?', 'type' => 'usability'],
        ];

        // Inserir perguntas
        foreach ($questions as $question) {
            DB::table('questions')->insert($question);
        }

        // Opções de Respostas
        $options = [
            // Pergunta 1
            ['id' => 1, 'question_id' => 1, 'answer' => 'Estruturados', 'next_question_id' => 2],
            ['id' => 2, 'question_id' => 1, 'answer' => 'Não estruturados', 'next_question_id' => 3],

            // Pergunta 2
            ['id' => 3, 'question_id' => 2, 'answer' => 'Pequeno (até alguns GB)', 'next_question_id' => 5],
            ['id' => 4, 'question_id' => 2, 'answer' => 'Médio (dezenas a centenas de GB)', 'next_question_id' => 5],
            ['id' => 5, 'question_id' => 2, 'answer' => 'Grande (terabytes ou mais)', 'next_question_id' => 4],

            // Pergunta 3
            ['id' => 6, 'question_id' => 3, 'answer' => 'Consultas simples e regulares', 'next_question_id' => 6],
            ['id' => 7, 'question_id' => 3, 'answer' => 'Necessidade de performance em tempo real', 'next_question_id' => 7],
            ['id' => 8, 'question_id' => 3, 'answer' => 'Alta disponibilidade e tolerância a falhas', 'next_question_id' => 8],
            ['id' => 9, 'question_id' => 3, 'answer' => 'Alta escalabilidade e grandes volumes de dados', 'next_question_id' => 9],

            // Pergunta 4
            ['id' => 10, 'question_id' => 4, 'answer' => 'Sim', 'next_question_id' => 10],
            ['id' => 11, 'question_id' => 4, 'answer' => 'Não', 'next_question_id' => 10],

            // Pergunta 5
            ['id' => 12, 'question_id' => 5, 'answer' => 'Facilidade de uso e configuração', 'next_question_id' => 11],
            ['id' => 13, 'question_id' => 5, 'answer' => 'Conformidade com padrões e recursos avançados', 'next_question_id' => 11],

            // Pergunta 6
            ['id' => 14, 'question_id' => 6, 'answer' => 'Sim', 'next_question_id' => 12],
            ['id' => 15, 'question_id' => 6, 'answer' => 'Não', 'next_question_id' => 12],

            // Pergunta 7
            ['id' => 16, 'question_id' => 7, 'answer' => 'Sim', 'next_question_id' => 13],
            ['id' => 17, 'question_id' => 7, 'answer' => 'Não', 'next_question_id' => 13],

            // Pergunta 8
            ['id' => 18, 'question_id' => 8, 'answer' => 'Sim', 'next_question_id' => 14],
            ['id' => 19, 'question_id' => 8, 'answer' => 'Não', 'next_question_id' => 14],

            // Pergunta 9
            ['id' => 20, 'question_id' => 9, 'answer' => 'Sim', 'next_question_id' => 15],
            ['id' => 21, 'question_id' => 9, 'answer' => 'Não', 'next_question_id' => 15],

            // Pergunta 10
            ['id' => 22, 'question_id' => 10, 'answer' => 'Sim', 'next_question_id' => null],
            ['id' => 23, 'question_id' => 10, 'answer' => 'Não', 'next_question_id' => null],
             // Pergunta 11
            ['id' => 24, 'question_id' => 11, 'answer' => 'Sim', 'next_question_id' => null],
            ['id' => 25, 'question_id' => 11, 'answer' => 'Não', 'next_question_id' => null],
             
                // Pergunta 12
            ['id' => 26, 'question_id' => 12, 'answer' => 'Sim', 'next_question_id' => null],
            ['id' => 27, 'question_id' => 12, 'answer' => 'Não', 'next_question_id' => null],

                // Pergunta 13
            ['id' => 28, 'question_id' => 13, 'answer' => 'Sim', 'next_question_id' => null],
            ['id' => 29, 'question_id' => 13, 'answer' => 'Não', 'next_question_id' => null],
                 // Pergunta 14
            ['id' => 30, 'question_id' => 14, 'answer' => 'Sim', 'next_question_id' => null],
            ['id' => 31, 'question_id' => 14, 'answer' => 'Não', 'next_question_id' => null],

                    // Pergunta 15
            ['id' => 32, 'question_id' => 15, 'answer' => 'Sim', 'next_question_id' => null],
            ['id' => 33, 'question_id' => 15, 'answer' => 'Não', 'next_question_id' => null],

        
        ];

        // Inserir opções de respostas
        foreach ($options as $option) {
            DB::table('options')->insert($option);
        }

        // Recomendações
        $recommendations = [
            // Questão 10 - Performance esperada
            [
                'recommendation' => 'Redis, Cassandra ou Aerospike',
                'question_id' => 10,
                'option_id' => 22, // Opção "Alta performance"
                'reason' => 'Redis oferece altíssima performance por operar inteiramente na memória, enquanto Cassandra é ideal para gravações massivas e sistemas distribuídos. Aerospike é excelente para baixa latência e alta escalabilidade.',
                'percentages' => [
                    'Redis' => 50,
                    'Cassandra' => 30,
                    'Aerospike' => 20
                ]
            ],
            [
                'recommendation' => 'MongoDB, Elasticsearch ou Couchbase',
                'question_id' => 10,
                'option_id' => 23, // Opção "Performance média"
                'reason' => 'MongoDB tem bom equilíbrio entre performance e flexibilidade, enquanto Elasticsearch se destaca para pesquisas rápidas em grandes volumes de dados. Couchbase oferece alta performance e flexibilidade com suporte a SQL-like queries.',
                'percentages' => [
                    'MongoDB' => 50,
                    'Elasticsearch' => 30,
                    'Couchbase' => 20
                ]
            ],
        
            // Questão 11 - Facilidade de Configuração
            [
                'recommendation' => 'MongoDB, SQLite ou Firebase',
                'question_id' => 11,
                'option_id' => 24, // Opção "Alta facilidade de configuração"
                'reason' => 'MongoDB é conhecido por sua simplicidade de instalação e manutenção. SQLite, sendo um banco leve, é extremamente simples para cenários locais ou de baixo tráfego. Firebase oferece uma solução de banco de dados em tempo real com configuração mínima.',
                'percentages' => [
                    'MongoDB' => 40,
                    'SQLite' => 30,
                    'Firebase' => 30
                ]
            ],
            [
                'recommendation' => 'CouchDB, MariaDB ou RethinkDB',
                'question_id' => 11,
                'option_id' => 25, // Opção "Média facilidade de configuração"
                'reason' => 'CouchDB oferece fácil configuração em sistemas distribuídos, enquanto MariaDB, como um fork do MySQL, é bem suportado e simples de configurar. RethinkDB é fácil de configurar e oferece sincronização em tempo real.',
                'percentages' => [
                    'CouchDB' => 40,
                    'MariaDB' => 30,
                    'RethinkDB' => 30
                ]
            ],
        
            // Questão 12 - Alta Disponibilidade
            [
                'recommendation' => 'Cassandra, MongoDB ou CockroachDB',
                'question_id' => 12,
                'option_id' => 26, // Opção "Alta disponibilidade"
                'reason' => 'Cassandra é projetado para alta disponibilidade com consistência eventual em sistemas distribuídos. MongoDB, com réplicas, também atende bem a alta disponibilidade. CockroachDB é uma solução distribuída que oferece alta disponibilidade e consistência.',
                'percentages' => [
                    'Cassandra' => 40,
                    'MongoDB' => 30,
                    'CockroachDB' => 30
                ]
            ],
            [
                'recommendation' => 'CouchDB, MariaDB ou Galera Cluster',
                'question_id' => 12,
                'option_id' => 27, // Opção "Média disponibilidade"
                'reason' => 'CouchDB é ideal para disponibilidade média com sincronização offline. MariaDB fornece replicação básica para sistemas menores que exigem consistência moderada. Galera Cluster oferece alta disponibilidade para MariaDB e MySQL.',
                'percentages' => [
                    'CouchDB' => 40,
                    'MariaDB' => 30,
                    'Galera Cluster' => 30
                ]
            ],
        
            // Questão 13 - Alta Escalabilidade
            [
                'recommendation' => 'Cassandra, HBase ou ScyllaDB',
                'question_id' => 13,
                'option_id' => 28, // Opção "Alta escalabilidade"
                'reason' => 'Cassandra é ideal para grandes volumes de dados com escalabilidade horizontal eficiente. HBase é uma alternativa para grandes clusters, mas com maior complexidade. ScyllaDB oferece alta escalabilidade com baixa latência, sendo compatível com Cassandra.',
                'percentages' => [
                    'Cassandra' => 40,
                    'HBase' => 30,
                    'ScyllaDB' => 30
                ]
            ],
            [
                'recommendation' => 'HBase, MariaDB ou Vitess',
                'question_id' => 13,
                'option_id' => 29, // Opção "Média escalabilidade"
                'reason' => 'HBase suporta escalabilidade para grandes clusters, enquanto MariaDB oferece boas opções para escalabilidade vertical em sistemas mais tradicionais. Vitess é uma solução de escalabilidade para MySQL, ideal para grandes volumes de dados.',
                'percentages' => [
                    'HBase' => 40,
                    'MariaDB' => 30,
                    'Vitess' => 30
                ]
            ],
        
            // Questão 14 - Dados Estruturados/Não Estruturados
            [
                'recommendation' => 'PostgreSQL, MySQL ou Oracle',
                'question_id' => 14,
                'option_id' => 30, // Opção "Estruturados"
                'reason' => 'PostgreSQL é robusto para esquemas complexos e consultas avançadas. MySQL é uma alternativa mais leve e rápida para dados estruturados menos complexos. Oracle é uma solução robusta e escalável para grandes volumes de dados estruturados.',
                'percentages' => [
                    'PostgreSQL' => 40,
                    'MySQL' => 30,
                    'Oracle' => 30
                ]
            ],
            [
                'recommendation' => 'MongoDB, Elasticsearch ou Couchbase',
                'question_id' => 14,
                'option_id' => 31, // Opção "Não estruturados"
                'reason' => 'MongoDB lida bem com dados não estruturados por seu suporte a documentos JSON. Elasticsearch é excelente para sistemas que exigem buscas rápidas e eficientes. Couchbase oferece flexibilidade e alta performance para dados não estruturados.',
                'percentages' => [
                    'MongoDB' => 50,
                    'Elasticsearch' => 30,
                    'Couchbase' => 20
                ]
            ],
        ];
        

        // Inserir recomendações
        foreach ($recommendations as $recommendation) {
            $recommendation['percentages'] = json_encode($recommendation['percentages']);
            DB::table('recommendations')->insert($recommendation);
        }
    }
}