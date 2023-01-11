<?php
/**
 * Função spl_autoload_register(function ($class_name)
 * Carrega uma classe quando ela é necessária, ou seja, quando ela é instanciada pela primeira vez.
 */

 spl_autoload_register(function ($class_name) {
    include_once "../app.ado/{$class_name}.class.php";
});

/**
 * cria as classes Active Record para manipular os registros das tabelas correspondentes
 */
class AlunoRecord extends TRecord {}
class TurmaRecord extends TRecord {}
class InscricaoRecord extends TRecord {}

// obtém objetos do banco de dados
try
{
    //inicia transação com o banco 'pg_livro'
    TTransaction::open('pg_livro');

    // Define o arquivo para LOG
    TTransaction::setLogger(new TLoggerTXT('../tmp/log6.txt'));

    ########################################################################
    # primeiro exemplo, lista todas as turmas em andamento no turno da tarde
    ########################################################################

    // Cria um critéro de seleção
    $criteria = new TCriteria;

    //filtra por populacao e estado
    $criteria->add(new TFilter('turno', '=', 'T')) ;
    $criteria->add(new TFilter('encerrada','=', FALSE));

    // instancia um repositório para turma
    $repository = new TRepository('Turma');

    // retorna todos objetos que satisfazem o critério
    $turmas = $repository->load($criteria);

    // verifica se retornou alguma cidade
    if($turmas)
    {
        echo "Turmas retornadas<br>\n";
        echo "-----------------<br>\n";

        // percorre todas turmas retornada
        foreach($turmas as $turma)
        {
            echo 'ID: '. $turma->id. ' - ';
            echo 'Dia: '. $turma->dia_semana. ' - ';
            echo 'Sala: '. $turma->sala. ' - ';
            echo 'Turno: '. $turma->turno. ' - ';
            echo 'professor: '. $turma->professor;
            echo "<br>\n";
        }
        echo "<br>\n";
    }

    ####################################################################
    # Segundo exemplo, lista todas os aprovados da turma "1"
    ####################################################################

    // instancia um critério de seleção
    $criteria = new TCriteria;
    $criteria->add(new TFilter('nota', '>=', 7));
    $criteria->add(new TFilter('frequencia', '>=', 75));
    $criteria->add(new TFilter('ref_turma', '=', 14));
    $criteria->add(new TFilter('cancelada', '=', FALSE));


    // instancia um repositório para Inscricao
    $repository = new TRepository('Inscricao');

    // retorna todos objetos que satisfazem o critério
    $inscricoes = $repository->load($criteria);

    // verifica se retornou alguma inscrição
    if($inscricoes)
    {
        echo "Inscrições retornadas <br>\n";
        echo "--------------------- <br>\n";

        // percorre todas incrições retornadas
        foreach($inscricoes as $inscricao)
        {
            echo 'ID: '. $inscricao->id. ' - ';
            echo 'Aluno: '. $inscricao->ref_aluno. ' - ';

            // obtém o aluno relacionado à inscrição
            $aluno= new AlunoRecord($inscricao->ref_aluno);

            echo 'Nome: '. $aluno->nome. ' - ';
            echo 'Endereço: '. $aluno->endereco;
            echo 'Endereço: '. $aluno->telefone;
            echo "<br>\n";
        }
    }
}
catch (Exception $e) // em caso de exceção
{
    //Exibe a mensagem gerada pela exceção
    echo "<b>Erro</b>". $e->getMessage();

    // Desfaz todas as alterações no BD
    TTransaction::rollback();
}