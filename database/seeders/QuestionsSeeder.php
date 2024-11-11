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
            ['question' => 'Se seus dados são estruturados ou não estruturados?', 'type' => 'simple'],
            ['question' => 'Qual é o volume dos seus dados?', 'type' => 'simple'],
            ['question' => 'Qual dessas características é mais importante para você?', 'type' => 'simple'],
            ['question' => 'Você precisa de suporte para alta escalabilidade horizontal?', 'type' => 'simple'],
            ['question' => 'Que tipo de operações são mais frequentes?', 'type' => 'simple'],
            ['question' => 'Você prefere uma solução que seja fácil de usar e configurar?', 'type' => 'simple'],
            ['question' => 'É crucial que suas operações de leitura e escrita sejam extremamente rápidas?', 'type' => 'simple'],
            ['question' => 'Você precisa de um sistema que ofereça replicação e distribuição de dados facilmente?', 'type' => 'simple'],
            ['question' => 'Você precisa de um sistema que possa lidar eficientemente com grandes volumes de dados distribuídos?', 'type' => 'simple'],
            ['question' => 'Considerações financeiras (qual seu orçamento para soluções de banco de dados?)', 'type' => 'simple'],
        ];

        foreach ($questions as $question) {
            DB::table('questions')->insert($question);
        }

        // Opções de Respostas
        $options = [
            // Pergunta 1
            ['question_id' => 1, 'answer' => 'Estruturados', 'next_question_id' => 2],
            ['question_id' => 1, 'answer' => 'Não estruturados', 'next_question_id' => 2],

            // Pergunta 2
            ['question_id' => 2, 'answer' => 'Pequeno (até alguns GB)', 'next_question_id' => 3],
            ['question_id' => 2, 'answer' => 'Médio (dezenas a centenas de GB)', 'next_question_id' => 3],
            ['question_id' => 2, 'answer' => 'Grande (terabytes ou mais)', 'next_question_id' => 3],

            // Pergunta 3
            ['question_id' => 3, 'answer' => 'Facilidade de uso e configuração', 'next_question_id' => 4],
            ['question_id' => 3, 'answer' => 'Conformidade com padrões e recursos avançados', 'next_question_id' => 4],

            // Pergunta 4
            ['question_id' => 4, 'answer' => 'Sim', 'next_question_id' => 5],
            ['question_id' => 4, 'answer' => 'Não', 'next_question_id' => 5],

            // Pergunta 5
            ['question_id' => 5, 'answer' => 'Consultas simples e regulares', 'next_question_id' => 6],
            ['question_id' => 5, 'answer' => 'Necessidade de performance em tempo real', 'next_question_id' => 6],
            ['question_id' => 5, 'answer' => 'Alta escalabilidade e grandes volumes de dados', 'next_question_id' => 6],

            // Pergunta 6
            ['question_id' => 6, 'answer' => 'Sim', 'next_question_id' => 7],
            ['question_id' => 6, 'answer' => 'Não', 'next_question_id' => 7],

            // Pergunta 7
            ['question_id' => 7, 'answer' => 'Sim', 'next_question_id' => 8],
            ['question_id' => 7, 'answer' => 'Não', 'next_question_id' => 8],

            // Pergunta 8
            ['question_id' => 8, 'answer' => 'Sim', 'next_question_id' => 9],
            ['question_id' => 8, 'answer' => 'Não', 'next_question_id' => 9],

            // Pergunta 9
            ['question_id' => 9, 'answer' => 'Sim', 'next_question_id' => 10],
            ['question_id' => 9, 'answer' => 'Não', 'next_question_id' => 10],

            // Pergunta 10
            ['question_id' => 10, 'answer' => 'Sim', 'next_question_id' => null],
            ['question_id' => 10, 'answer' => 'Não', 'next_question_id' => null],
        ];

        foreach ($options as $option) {
            DB::table('options')->insert($option);
        }

        // Recomendações
        $recommendations = [
            // Para dados estruturados, pequenas necessidades de uso
            ['recommendation' => 'Para dados estruturados e pequenos volumes, recomendamos MySQL ou PostgreSQL.', 'question_id' => 1, 'option_id' => 1],
            // Para dados não estruturados, grandes volumes de dados
            ['recommendation' => 'Para dados não estruturados e grandes volumes, recomendamos MongoDB ou Cassandra.', 'question_id' => 1, 'option_id' => 2],
            // Para dados de médio porte, com facilidade de uso
            ['recommendation' => 'Para dados de médio porte e facilidade de uso, recomendamos MariaDB.', 'question_id' => 2, 'option_id' => 2],
            // Recomendação com escalabilidade horizontal
            ['recommendation' => 'Para alta escalabilidade horizontal, recomendamos Cassandra ou MongoDB.', 'question_id' => 4, 'option_id' => 1],
            // Recomendação de fácil configuração
            ['recommendation' => 'Para fácil configuração e consultas simples, recomendamos MySQL ou SQLite.', 'question_id' => 6, 'option_id' => 1],
            // Recomendação de performance rápida
            ['recommendation' => 'Para performance em tempo real, recomendamos Redis ou Cassandra.', 'question_id' => 7, 'option_id' => 1],
            // Recomendação de alta disponibilidade
            ['recommendation' => 'Para alta disponibilidade e replicação de dados, recomendamos MongoDB ou Couchbase.', 'question_id' => 8, 'option_id' => 1],
            // Recomendação de grandes volumes de dados distribuídos
            ['recommendation' => 'Para grandes volumes de dados distribuídos, recomendamos Hadoop ou Cassandra.', 'question_id' => 9, 'option_id' => 1],
            // Recomendação para soluções de baixo custo
            ['recommendation' => 'Para baixo custo, recomendamos MySQL ou PostgreSQL.', 'question_id' => 10, 'option_id' => 2],
        ];

        foreach ($recommendations as $recommendation) {
            DB::table('recommendations')->insert($recommendation);
        }
    }
}
