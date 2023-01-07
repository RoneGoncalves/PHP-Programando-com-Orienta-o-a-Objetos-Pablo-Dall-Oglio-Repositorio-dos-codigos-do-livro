<?php
/**
 * Função spl_autoload_register(function ($class_name)
 * Carrega uma classe quando ela é necessária, ou seja, quando ela é instanciada pela primeira vez.
 */

 spl_autoload_register(function ($class_name) {
    include_once "/var/www/html/livro_php/app.ado/{$class_name}.class.php";
});

/**
 * classe AlunoRecord, filha de TRecord
 * persiste um alono no BD
 */
class AlunoRecord extends TRecord{}

/**
 * classe CursoRecord, filha de TRecord
 * persiste um curso no BD
 */
class CursoRecord extends TRecord{}

// Altera objetos no BD
try 
{
    //Inicia transação com BD 'pg_livro"
    TTransaction::open('pg_livro');

    // Define o arquivo para LOG
    TTransaction::setLogger(new TLoggerTXT('/var/www/html/livro_php/tmp/log3.txt'));

    TTransaction::log("** Obtendo o aluno 1");

    // Instacia registro de Aluno
    $record = new AlunoRecord;
    $aluno = $record->load(1);
    if($aluno) // Verifica se o aluno existe
    {
        // altera o telefone
        $aluno->telefone = '(51) 1111-3333';
        TTransaction::log("** persistindo o aluno");

        // Aramazena o aluno
        $aluno->store();
    }

    TTransaction::log("** obtendo o curso 1");

    // Instancia registro de curso
    $record = new CursoRecord;

    // Obtém curso ID 1
    $curso = $record->load(1);

    if($curso)  // Verifica se o curso existe
    {
        // altera a duração do curso
        $curso->duracao = 28;
        TTransaction::log("** persistindo o curso 1");

        // Armazena o objeto
        $curso->store();    
    }

    // finaliza a transação
    TTransaction::close();

    // Exibe mensagem de sucesso
    echo "Registros alterados com sucesso<br>\n";

} 
catch (Exception $e) // em caso de exceção
{
    //Exibe a mensagem gerada pela exceção
    echo "<b>Erro</b>". $e->getMessage();

    // Desfaz todas as alterações no BD
    TTransaction::rollback();
}