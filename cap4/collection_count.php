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

// conta objetos do banco de dados
try
{
    //inicia transação com o banco 'pg_livro'
    TTransaction::open('pg_livro');

    // Define o arquivo para LOG
    TTransaction::setLogger(new TLoggerTXT('../tmp/log8.txt'));

    ########################################################################
    # primeiro exemplo conta todos alunos de São Carlos
    ########################################################################

    TTransaction::log("** Conta alunos de São Carlos");

    // instancia um critério de seleção
    $criteria = new TCriteria;
    $criteria->add(new TFilter('cidade', '=', 'São Carlos'));

    // instancia um repositório de alunos
    $repository = new TRepository('Aluno');

    // obtém o total de alunos que satisfazem o criterio
    $count = $repository->count($criteria);

    //Exibe o total na tela
    echo "Total de alunos de São Carlos: {$count} <br>\n";
   
    ############################################################
    # segundo exemplo, Contar todas as turmas com aula na sala
    # "100" no turno da Tarde OU na "200" pelo turno da manha. 
    ############################################################

    TTransaction::log("** Conta Turmas");

    // instacias um critério de seleção
    // sala "100" e turno "T" (tarde)
    $criteria_1 = new TCriteria;
    $criteria_1->add(new TFilter('sala','=', '100'));
    $criteria_1->add(new TFilter('turno','=', 'T'));

    // instancia critério de seleção
    //sala "200" e turno "M" (manha)
    $criteria_2 = new TCriteria;
    $criteria_2->add(new TFilter('sala','=', '200'));
    $criteria_2->add(new TFilter('sala','=', 'M'));
    
     // instancia critério de seleção
    // com OU pajuntar os critéros anteriores
    $criteria = new TCriteria;
    $criteria->add($criteria_1, TExpression::OR_OPERATOR);
    $criteria->add($criteria_2, TExpression::OR_OPERATOR);
    //echo $criteria->dump();

    // instancia um repositório de Turmas
    $repository = new TRepository('Turma');

    // retorna quantos objetos satisfazem o critério
    $count = $repository->count($criteria);
    
    //Exibe o total na tela
    echo "Total de turmas: {$count} <br>\n";

    // finaliza a transação
    TTransaction::close();
}
catch (Exception $e) // em caso de exceção
{
    //Exibe a mensagem gerada pela exceção
    echo "<b>Erro</b>". $e->getMessage();

    // Desfaz todas as alterações no BD
    TTransaction::rollback();
}