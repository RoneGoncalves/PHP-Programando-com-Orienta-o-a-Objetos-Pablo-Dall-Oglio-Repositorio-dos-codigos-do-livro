<?php
/**
 * Função spl_autoload_register(function ($class_name)
 * Carrega uma classe quando ela é necessária, ou seja, quando ela é instanciada pela primeira vez.
 */

 spl_autoload_register(function ($class_name) {
    include_once "../app.ado/{$class_name}.class.php";
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


// Obtém os objetod do BD
try 
{
    //Inicia transação com BD 'pg_livro"
    TTransaction::open('pg_livro');

    // Define o arquivo para LOG
    TTransaction::setLogger(new TLoggerTXT('../tmp/log5.txt'));

    // Armazena esta frase no arquivo e LOG
    TTransaction::log("** Apagando da primeira forma");

    // Carrega o objeto 
    $aluno = new AlunoRecord(3);
    
    // deleta o objeto
    $aluno->delete();

    // Armazena esta frase no arquivo e LOG
    TTransaction::log("** Apagando da segunda forma");

    // Instancia um objeto $modelo
    $modelo = new AlunoRecord;

    // Deleta o objeto $modelo
    $modelo->delete(2);
   
    // Finaliza a transação
    TTransaction::close();

    echo "Exclusão realizada com sucesso!!<br>\n";
} 
catch (Exception $e) // em caso de exceção
{
    //Exibe a mensagem gerada pela exceção
    echo "<b>Erro</b>". $e->getMessage();

    // Desfaz todas as alterações no BD
    TTransaction::rollback();
}

