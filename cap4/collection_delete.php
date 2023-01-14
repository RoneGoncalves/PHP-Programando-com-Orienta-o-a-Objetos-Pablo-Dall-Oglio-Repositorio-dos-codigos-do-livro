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
class InscricaoRecord extends TRecord {}
class TurmaRecord extends TRecord {}

// deleta objetos do banco de dados
try
{
    //inicia transação com o banco 'pg_livro'
    TTransaction::open('pg_livro');

    // Define o arquivo para LOG
    TTransaction::setLogger(new TLoggerTXT('../tmp/log9.txt'));

    ########################################################################
    # primeiro exemplo, exclui todas turmas da tarde
    ########################################################################

    TTransaction::log("** exclui as turmas da tarde");

    // instancia um critério de seleção turno= 'T'
    $criteria = new TCriteria;
    $criteria->add(new TFilter('turno', '=', 'T'));

    // instancia reposotório de turmas
    $repository = new TRepository('Turma');

    //retorna todos objetos que satisfazem o critério
    $turmas = $repository->load($criteria);

    // verifica se retornou alguma turma
    if($turmas)
    {
        // percorre todas turmas retornadas
        foreach($turmas as $turma)
        {
            // exclui a turma
            $turma->delete();
        }
    }

    ######################################################
    # segundo exemplo, exclui as inscrições do aluno "1" #
    ######################################################

    TTransaction::log("** exclui as inscrições do aluno '1'");

    // instancia critério de seleção de dados ref_aluno ='1'
    $criteria = new TCriteria;
    $criteria->add(new TFilter('ref_aluno', '=', 1));

    // Instancia repositório de inscrição
    $repository = new TRepository('Inscricao');

    // exclui todos os objetos que satisfaçam este critério de seleção
    $repository->delete($criteria);

    echo "Registros escluidos com sucesso <br>\n";

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