<?php

/**
 * Função spl_autoload_register(function ($class_name)
 * Carrega uma classe quando ela é necessária, ou seja, quando ela é instanciada pela primeira vez.
 */

 spl_autoload_register(function ($class_name) {
    include_once "../app.ado/{$class_name}.class.php";
});

try
{
    // Abre uma transação
    TTransaction::open('pg_livro');
    // Define a estratégia de LOG
    TTransaction::setLogger(new TLoggerHTML('../tmp/arquivo.html'));
    // Escreve a mensgem de LOG
    TTransaction::log("Inserindo o registro Rone Bolha");

    // Cria uma instrução insert
    $sql = new TSqlInsert;
    // Define o nome da entidade
    $sql->setEntity('famosos');
    // Atribui o valor a cada coluna)
    $sql->setRowData('codigo', 27);
    $sql->setRowdata('nome', 'Rone Bolha');

    // Obtém a conxão ativa
    $conn = TTransaction::get();
    // Executa a instrução SQL
    $result = $conn->Query($sql->getInstruction());
    // Escreve a mensagem de LOG
    TTransaction::log($sql->getInstruction());


    // Define a estratégia de LOG
    TTransaction::setLogger(new TLoggerXML('../tmp/arquivo.xml'));
    // escreve amensagem de LOG
    TTransaction::log("Inserindo o registro Ronaldo Gonc");

    // Cria uma instrução insert
    $sql = new TSqlInsert;
    // Define o nome da entidade
    $sql->setEntity('famosos');
    // Atribui o valor a cada coluna)
    $sql->setRowData('codigo', 28);
    $sql->setRowdata('nome', 'Ronaldo Gonc');

    // Obtém a conxão ativa
    $conn = TTransaction::get();
    // Executa a instrução SQL
    $result = $conn->Query($sql->getInstruction());
    // Escreve a mensagem de LOG
    TTransaction::log($sql->getInstruction());


    // Fecha a transação, aplicando todas as operações
    TTransaction::close();

}
catch(Exception $e)
{
    // Exibe a mensagem mde erro
    echo $e->getmessage();
    // desfaz as operações realizadas durante a transaçõa
    TTransaction::rollback();
}