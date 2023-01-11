<?php

/**
 * função __autoload()
 * Carrega uma classe quando ela é necessária, ou seja quando ela é instanciada pela primeira vez.
*/

spl_autoload_register(function ($class_name) {
    include_once "../app.ado/{$class_name}.class.php";
});

// cria criterio de seeção de dados
$criteria = new TCriteria;
$criteria->add(new TFilter('id', '=', '3'));


// cria a instrução DELETE
$sql = new TSqlDelete;

// define a entidade
$sql->setEntity('aluno');

// define o critério de seleção
$sql->setCriteria($criteria);

// processa a instrução SQL
echo $sql->getInstruction();
echo "\n";