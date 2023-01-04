<?php
/**
 * Função spl_autoload_register(function ($class_name)
 * Carrega uma classe quando ela é necessária, ou seja, quando ela é instanciada pela primeira vez.
 */

 spl_autoload_register(function ($class_name) {
    include_once "app.ado/{$class_name}.class.php";
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
    TTransaction::setLogger(new TLoggerTXT('/tmp/log2.txt'));

    // Exibe algumas mensagens na tela
    echo "Obtendo alunos<br>\n";
    echo "==============<br>\n";


    // Obtém o aluno de ID 1
    $aluno = new AlunoRecord(1);
    echo 'Nome: '. $aluno->nome . "<br>\n";
    echo 'Endereço: '. $aluno->endereco . "<br>\n";
    echo 'Telefone: '. $aluno->telefone . "<br>\n";
    echo 'Cidade: '. $aluno->cidade . "<br>\n";
    echo "<br>\n";

    // Obtém o aluno de ID 2
    $aluno = new AlunoRecord(2);
    echo 'Nome: '. $aluno->nome . "<br>\n";
    echo 'Endereço: '. $aluno->endereco . "<br>\n";
    echo 'Telefone: '. $aluno->telefone . "<br>\n";
    echo 'Cidade: '. $aluno->cidade . "<br>\n";
    echo "<br>\n";

    // Obtém o aluno de ID 3
    $aluno = new AlunoRecord(3);
    echo 'Nome: '. $aluno->nome . "<br>\n";
    echo 'Endereço: '. $aluno->endereco . "<br>\n";
    echo 'Telefone: '. $aluno->telefone . "<br>\n";
    echo 'Cidade: '. $aluno->cidade . "<br>\n";
    echo "<br>\n";

    // Obtém o aluno de ID 4
    $aluno = new AlunoRecord(4);
    echo 'Nome: '. $aluno->nome . "<br>\n";
    echo 'Endereço: '. $aluno->endereco . "<br>\n";
    echo 'Telefone: '. $aluno->telefone . "<br>\n";
    echo 'Cidade: '. $aluno->cidade . "<br>\n";
    echo "<br>\n";

    // Obtém alguns cursos
    echo "Obtendo cursos<br>\n";
    echo "==============<br>\n";

    // Obtém o curso de ID 1
    $curso = new CursoRecord(1);
    echo 'Curso: '. $curso->descricao . "<br>\n";
    echo 'Duração: '. $curso->duracao . "<br>\n";

    // Obtém o curso de ID 2
    $curso = new CursoRecord(2);
    echo 'Curso: '. $curso->descricao . "<br>\n";
    echo 'Duração: '. $curso->duracao . "<br>\n";
    echo "<br>\n";

    // Finaliza a transação
    TTransaction::close();
} 
catch (Exception $e) // em caso de exceção
{
    //Exibe a mensagem gerada pela exceção
    echo "<b>Erro</b>". $e->getMessage();

    // Desfaz todas as alterações no BD
    TTransaction::rollback();
}

