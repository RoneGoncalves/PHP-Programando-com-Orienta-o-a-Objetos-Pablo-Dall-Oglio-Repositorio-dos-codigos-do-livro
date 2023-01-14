<?php
/**
 * Função spl_autoload_register(function ($class_name)
 * Carrega uma classe quando ela é necessária, ou seja, quando ela é instanciada pela primeira vez.
 */

 spl_autoload_register(function ($class_name) {
    include_once "../app.ado/{$class_name}.class.php";
});

/**
 * classe InscricaoRecord, finha de TRecord
 * persiste uma inscricao no BD
 */
class InscricaoRecord extends TRecord
{
    /**
     * método get_aluno()
     * executa sempre que for acessada a propriedade "aluno"
     */
    function get_aluno()
    {
        //instancia AlunoRecord, carrega
        // na memória o aluno de código $this->ref_aluno
        $aluno= new AlunoRecord($this->ref_aluno);

        // retorna o objeto aluno
        return $aluno;
    }
}

/**
 * classe AlunoRecord, filha de TRecord
 * 
 */
class AlunoRecord extends TRecord
{
    /**
     * método get_inscricoes()
     * executado sempre se for acessada a propriedade "inscricoes"
     */
    function get_inscricoes()
    {
        // cria um critério de seleção
        $criteria =new TCriteria;

        // filtra ppor código do aluno
        $criteria->add(new TFilter('ref_aluno', '=', $this->id));

        // instancia repositório de Inscrições
        $repository = new TRepository('Inscricao');

        // Retorna todas as inscrições que satisfazem o critério
        return $repository->load($criteria);
    }
}

try
{
    //inicia transação com o banco 'pg_livro'
    TTransaction::open('pg_livro');

    // Define o arquivo para LOG
    TTransaction::setLogger(new TLoggerTXT('../tmp/log11.txt'));

    // armazena esta frase no arquivo de LOG
    TTransaction::log("** obtendo o aluno de uma inscrição");

    // instancia a inscriçãocujo ID é "2"
    $inscricao = new InscricaoRecord(3);

    // exibe os dados relacionados de aluno (associação)
    echo "Dados da inscrição <br>\n";
    echo "==========================<br>\n";
    echo 'Nome: ' . $inscricao->aluno->nome . "<br>\n";
    echo 'Endereço: ' . $inscricao->aluno->endereco . "<br>\n";
    echo 'Cidade: ' . $inscricao->aluno->cidade . "<br>\n";

    // Armazena esta frase no arquivo de LOG
    TTransaction::log("** Obtendo as inscrições de um aluno");

    // Instancia o aluno de ID "2"
    $aluno = new AlunoRecord(3);

    echo "<br>\n";
    echo "Inscrições do Aluno<br>\n";
    echo "---------------------------<br>\n";

    //  exibe os dados relacionados de inscrições (agregação)

    foreach($aluno->inscricoes as $inscricao)
    
    {
        echo 'ID: '. $inscricao->id. "<br>\n";
        echo 'Turma: '. $inscricao->ref_turma. "<br>\n";
        echo 'Nota: '. $inscricao->nota. "<br>\n";
        echo 'Frequência: '. $inscricao->frequencia. "<br>\n";
        echo "<br>\n";
    }

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