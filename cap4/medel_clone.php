<?php
/**
 * Função spl_autoload_register(function ($class_name)
 * Carrega uma classe quando ela é necessária, ou seja, quando ela é instanciada pela primeira vez.
 */

 spl_autoload_register(function ($class_name) {
    include_once "app.ado/{$class_name}.class.php";
});


/**
 * Classe AlunoRecord, filha de TRecord
 *  persiste um Aluno no banco de dados
 */
class AlunoRecord extends TRecord{}


/**
 * Classe CursoRecord, filha de TRecord
 * persiste um curso no banco de dados
 */
class CursoRecord extends TRecord{}

// Instancia um objeto Aluno
$fabio = new AlunoRecord;

// Define algumas propriedades
$fabio->nome = 'Fabio Locatelli';
$fabio->endereco = 'Rua Merlin';
$fabio->telefone = '(51) 2222-1111';
$fabio->cidade = 'Lajeado';

// clona o objeto $fabio
$julia = clone $fabio;

// altera algumas propriedades
$julia->nome = 'Julia Haubert';
$julia->telefone = '(51) 2222-2222';

try
{
    // Inicia a transação com o BD 'pg_livro'
    TTransaction::open('pg_livro');

    // Define o aarquivo de LOG
    TTransaction::setLogger(new TLoggerTXT('tmp/log4.txt'));

    // Armazena o objeto $fabio
    TTransaction::log("** Persistindo o objeto \$fabio");
    $fabio->store();

    // Armazena o objeto $julia
    TTransaction::log("** Persistindo o objeto \$julia");
    $julia->store();

    // finaliza a transação
    TTransaction::close();

    echo "Clonagem realizado com sucesso!!<br>\n";
}
catch (Exception $e) // em caso de exceção 
{
    //exibe a mensagem gerada pela exceção
    echo '<b> Erro </b>'. $e->getMessage();

    // desfaz todas alterações no banco de dados
    TTransaction::rollback();
}