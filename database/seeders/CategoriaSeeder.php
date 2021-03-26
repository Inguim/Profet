<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'menu_id' => 2,
            'descricao' => 'É a área que visa a busca do aprimoramento técnico, o aumento produtivo e melhorias no manejo e preservação dos recursos naturais, sendo os seus profissionais capazes de propor soluções através do entendimento de produção agropecuária, comercialização dos produtos e preservação ambiental. Não levando em conta o desenvolvimento de projetos, que seria basicamente o desenvolvimento de técnicas de melhorias dentro e fora do campus, seja na correção de um solo ou formas alternativas de produzir algo de origem animal ou vegetal',
            'nome' => 'Ciências Agrárias',
            'slug' => Str::slug("Ciencias Agrarias")
        ]);

        Categoria::create([
            'menu_id' => 2,
            'descricao' => 'O termo Ciências Biológicas se refere aos estudos de diferentes seres vivos como plantas, animais, bactérias, etc. Ou seja, Ciências Biológicas é o estudo da Biologia como ciência, que abrange o funcionamento de organismos vivos de diferentes portes, desde escala microscópica até populações inteiras de diferentes formas de vida',
            'nome' => 'Ciências Biológicas',
            'slug' => Str::slug("Ciencias Biologicas")
        ]);

        Categoria::create([
            'menu_id' => 2,
            'descricao' => 'As Ciências da Saúde são aquelas que estão preocupadas com o corpo e a saúde, seja humana ou animal. São aquelas que pesquisam doenças físicas e tentam encontrar formas de erradica-las ou ao menos reduzi-las, além de tentar trazer conforto para o corpo. Como exemplo disso, nós temos a Educação física e a Fisioterapia',
            'nome' => 'Ciências da Saúde',
            'slug' => Str::slug("Ciencias da Saude")
        ]);

        Categoria::create([
            'menu_id' => 2,
            'descricao' => 'São as áreas ligadas a cálculos, estatísticas e projeções físicas ou matemáticas, além de exatidão computacional e todas as suas ramificações. Exemplos disso são Matemática, Ciências da Computação e Geografia',
            'nome' => 'Ciências Exatas e da Terra',
            'slug' => Str::slug("Ciencias Exatas e da Terra")
        ]);

        Categoria::create([
            'menu_id' => 2,
            'descricao' => 'São as áreas voltadas para o conhecimento humano, seja analisando acontecimentos através do tempo até os dias de hoje, seja pela escrita ou seja através de pensadores. História, Letras e Filosofia integram essa categoria',
            'nome' => 'Ciências Humanas',
            'slug' => Str::slug("Ciencias Humanas")
        ]);

        Categoria::create([
            'menu_id' => 2,
            'descricao' => 'As Ciências Sociais Aplicadas reúne campos de conhecimento interdisciplinares, voltados para os aspectos sociais das diversas realidades humanas. Ou seja, entender quais são as necessidades da sociedade e, também, quais são as consequências de viver em sociedade',
            'nome' => 'Ciências Sociais Aplicadas',
            'slug' => Str::slug("Ciencias Sociais Aplicadas")
        ]);

        Categoria::create([
            'menu_id' => 2,
            'descricao' => 'As Engenharias são a área da aplicação, onde se coloca em prática diversos conceitos aprendidos na teoria, como a engenharia civil que constroi edificações a partir de cálculos, geometria, etc; e a engenharia computacional, que se preocupada com o hardware (parte física do computador)',
            'nome' => 'Engenharias',
            'slug' => Str::slug("Engenharias")
        ]);

        Categoria::create([
            'menu_id' => 2,
            'descricao' => 'As áreas de Linguística, Letras e Artes trabalha na elaboração de material didático e projetos de alfabetização, viabilizando e facilitando a comunicação entre os seres humanos, além de se voltar para expressão artística e cultural',
            'nome' => 'Linguística, Letras e Artes',
            'slug' => Str::slug("Linguistica, Letras e Artes")
        ]);

        Categoria::create([
            'menu_id' => 2,
            'descricao' => 'São os projetos que englobam mais de uma área, independente de qual sejam elas',
            'nome' => 'Multidisciplinar',
            'slug' => Str::slug("Multidisciplinar")
        ]);
    }
}
