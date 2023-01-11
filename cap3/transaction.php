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

    //cria uma instrução insert
    $sql = new TSqlInsert;
    // define o nome da entidade
    $sql->setEntity('famosos');
    // aatribui valor a cada coluna
    $sql->setRowData('codigo', '9');
    $sql->setRowData('nome', 'CI&T');

    // obtem a conexão ativa
    $conn = TTransaction::get();
    // executa a instrução SQL
    $result = $conn->Query($sql->getInstruction());

    // cria um instrução update
    $sql = new TSqlUpdate;
    // Define o nome da entidade
    $sql->setEntity('famosos');
    // atribui o valor de cada coluna
    $sql->setRowData('nome', "CI&T Tô dentro!!!");

    //cria critério de seleção de dados
    $criteria = new TCriteria;
    // obtém a pessoa de código '8'
    $criteria->add(new TFilter('codigo', '=', '9'));

    // atribui crtério de seleção de dados
    $sql->setCriteria($criteria);

    //print_r($sql);

    // obtém a conexão ativa
    $conn = TTransaction::get();
    // executa a instrução SQL
    $result = $conn->Query($sql->getInstruction());

    // Fecha a transaçãop, aplicando todas as operações
    TTransaction::close();
}
catch(Exception $e)
{
    // exibe a mensagem de erro
    echo $e->getMessage();
    // desfaz operações realizadas durante a transação
    TTransaction::rollback();
}