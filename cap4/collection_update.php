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

// obtém objetos do banco de dados
try 
{
    //inicia transação com o banco 'pg_livro'
    TTransaction::open('pg_livro');

    // Define o arquivo para LOG
    TTransaction::setLogger(new TLoggerTXT('../tmp/log7.txt'));

    // Cria um critéro de seleção
    $criteria = new TCriteria;

    //filtra por populacao e estado
    $criteria->add(new TFilter('ref_turma', '=', 2)) ;
    $criteria->add(new TFilter('cancelada','=', FALSE));

    // instancia um repositório para Inscriçao
    $repository = new TRepository('Inscricao');

    // retorna todos objetos que satisfazem o critério
    $inscricoes = $repository->load($criteria);

    // verifica se retornou alguma inscrição
    if($inscricoes)
    {
        TTransaction::log("** altera as inscrições");

        foreach($inscricoes as $inscricao)
        {
            // altera algumas propriedades
            $inscricao->nota = 8;
            $inscricao->frequencia = 75;

            // Armazena o objeto no banco de dados
            $inscricao->store();
        }
    }
    // finaliza a transação
    TTransaction::close();
    echo ';)';
} 
catch (Exception $e) // em caso de exceção
{
    //Exibe a mensagem gerada pela exceção
    echo "<b>Erro</b>". $e->getMessage();

    // Desfaz todas as alterações no BD
    TTransaction::rollback();
}