<?php
/**
 * Função spl_autoload_register(function ($class_name)
 * Carrega uma classe quando ela é necessária, ou seja, quando ela é instanciada pela primeira vez.
 */

 spl_autoload_register(function ($class_name) {
    include_once "../app.ado/{$class_name}.class.php";
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

// insere novos objetos no BD
try 
{
    //inicia a transação com o banco de dados pg_livro
    TTransaction::open('pg_livro');

    // define o arquivo para LOG
    TTransaction::setLogger(new TLoggerTXT('../tmp/log.txt'));

    // armazena esta frase no arquivo de log
    TTransaction::log("** inserindo alunos");

    // instancia um novo objeto aluno
    $daline = new AlunoRecord;
    $daline->nome = 'Daline Dall Oglio';
    $daline->endereco = "Rua da Conceição";
    $daline->telefone = '(51) 1111-2222';
    $daline->cidade = 'Cruzeiro do SUL';
    $daline->store();   // armazena o objeto

    // instancia um novo objeto aluno
    $willian = new AlunoRecord;
    $willian->nome = 'willian Scatolla';
    $willian->endereco = "Rua de Fátima";
    $willian->telefone = '(51) 1111-4444';
    $willian->cidade = 'Encantado';
    $willian->store();  // armazena o objeto

    // armazena esta frase no arquivo de log
    TTransaction::log("** inserindo cursos");

    // instancia um novo objeto Curso
    $curso = new CursoRecord;
    $curso->descricao = 'Orientação a Objetos com PHP';
    $curso->duracao = 24;
    $curso->store();  // armazena o objeto

    // instancia um novo objeto Curso
    $curso = new CursoRecord;
    $curso->descricao = 'Desenvolvimento em PHP-GTK';
    $curso->duracao = 32;
    $curso->store();  // armazena o objeto

    // finaliza a transação
    TTransaction::close();
    echo "Registros inserido com Sucesso!!<br>\n";
} 
catch (Exception $e) // em caso de exceção 
{
    //exibe a mensagem gerada pela exceção
    echo '<b> Erro </b>'. $e->getMessage();

    // desfaz todas alterações no banco de dados
    TTransaction::rollback();
}