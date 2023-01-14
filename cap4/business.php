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
* persiste um Aluno no banco de dados
*/
class AlunoRecord extends TRecord
{
    /**
     * método inscrever()
     * cria uma inscrição para este aluno
     *  @param $turma = número da turma
     */
    function inscrever($turma)
    {
        // instancia uma inscrição
        $inscricao = new InscricaoRecord;

        // define algumas propriedades
        $inscricao->ref_aluno = $this->id;
        $inscricao->ref_turma = $turma;
        
        // persiste a inscrição
        $inscricao->store();
    }
}

/**
 * classe InscricaoRecord, filha de TRecord
 * 'persiste uma inscrição no BD
 */
class InscricaoRecord extends TRecord {}

// insere novos objetos no banco de dados
try
{
    //inicia transação com o banco 'pg_livro'
    TTransaction::open('pg_livro');

    // Define o arquivo para LOG
    TTransaction::setLogger(new TLoggerTXT('../tmp/log12.txt'));

    // armazena esta frase no arquivo de LOG
    TTransaction::log("** Inserindo o aluno \$chico");

    // Instancia um novo aluno
    $chico = new AlunoRecord;;
    $chico->nome = 'Chico da Tiana';
    $chico->endereco = "Rua Francisco Oscar";
    $chico->Telefone = '(16) 5555-0001';
    $chico->Cidade = 'São Carlos';
    $chico->store(); // armazena o objeto

    // armazena esta frase no arquivo de LOG
    TTransaction::log("** inscrevendo o aluno nas turmas");

    // executa o método Inscrever (na turma 1 e 2)
    $chico->Inscrever(1);
    $chico->Inscrever(2);

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