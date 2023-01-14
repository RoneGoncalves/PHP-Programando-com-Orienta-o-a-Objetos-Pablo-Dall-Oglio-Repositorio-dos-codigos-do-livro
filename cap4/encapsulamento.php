<?php
/**
 * Função spl_autoload_register(function ($class_name)
 * Carrega uma classe quando ela é necessária, ou seja, quando ela é instanciada pela primeira vez.
 */

 spl_autoload_register(function ($class_name) {
    include_once "../app.ado/{$class_name}.class.php";
});

/**
 * classe TurmaRecord, filha de TRecord
 * persiste um aluno no BD
 */
class TurmaRecord extends TRecord
{
    /**
     * método set_dia_semana()
     * executado sempre que há uma atribuição para "dia_semana"
     * @param $valor = valor atribuido
     */ 
    function set_dia_semana($valor)
    {
        // verifica se o dia da semana está estre 1 e 7 e se é inteiro
        if(is_int($valor) and (($valor >= 1) and ($valor <= 7)))
        {
            // atribui valor à propriedade
            $this->data['dia_semana'] = $valor;
        }
        else
        {
            // exibe mensagem de erro
            echo "Tentou atribuir '{$valor}' em dia_semana <br>\n";
            //throw new Exception(" Valor invalido");

        }
    }
    
    /**
     * método set_turno()
     * executado sempre que há uma atribuição para "turno"
     */
    function set_turno($valor)
    {
        echo 'Entrei';
        // verifica se o valor é 'M', 'T' ou 'N'
        if (($valor == 'M') or ($valor == 'T') or ($valor == 'N'))
        {
            // atribui o valor à propriedade
            $this->data['turno'] = $valor;
        }
        else
        {
            // exibe mensagem de erro
            echo "Tento atribuir '{$valor}' em dai_semana <br>\n";
            //throw new Exception(" Valor invalido");
        }
    }
}

// insere novos objetos no banco de dados
try
{
    //inicia transação com o banco 'pg_livro'
    TTransaction::open('pg_livro');

    // Define o arquivo para LOG
    TTransaction::setLogger(new TLoggerTXT('../tmp/log10.txt'));

    // armazena esta frase no arquivo de LOG
    TTransaction::log("** Inserindo turma 1");

    // Instancia um novo objeto Truma
    $turma = new TurmaRecord;
    $turma->dia_semana = 1;
    $turma->turno = 'M';
    $turma->professor = 'Carlo Bellini';
    $turma->sala = '100';
    $turma->data_inicio = '2002-01-01';
    $turma->encerrada = FALSE;
    $turma->ref_curso = 2;
    $turma->store(); // armazena o objeto
    

    // armazena esta frase no arquivo de LOG
    // TTransaction::log("** Inserindo turma 2");

    // Instancia um novo objeto Truma
    $turma = new TurmaRecord;
    $turma->dia_semana = 'Segunda';
    $turma->turno = 'Manhã';
    $turma->professor = 'Sérgio Cresp';
    $turma->sala = '200';
    $turma->data_inicio = '2004-01-01';
    $turma->encerrada = FALSE;
    $turma->ref_curso = 3;
    $turma->store(); // armazena o objeto

    // finaliza a transação
    TTransaction::close();

    echo "Registros inseridos com sucesso!!<br>\n";
}
catch (Exception $e) // em caso de exceção
{
    //Exibe a mensagem gerada pela exceção
    echo "<b>Erro</b>". $e->getMessage();

    // Desfaz todas as alterações no BD
    TTransaction::rollback();
}