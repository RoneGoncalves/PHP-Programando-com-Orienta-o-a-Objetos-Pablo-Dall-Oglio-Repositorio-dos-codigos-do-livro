<?php

/**
 * função __autoload()
 * Carrega uma classe quando ela é necessária, ou seja, quando ela é instanciada pela primeira vez.
*/

spl_autoload_register(function ($class_name) {
    include_once "../app.ado/{$class_name}.class.php";
});


// cria critério de seleção de dados
$criteria = new TCriteria;
$criteria->add(new TFilter('id', '=', '3'));

// cria  ainstrução UPDATE
$sql = new TSqlUpdate;

// Define a entidade
$sql->setEntity('aluno');

// atribui o valor de cada coluna
$sql->setRowData("\nnome", '    Pedro Cardoso');
$sql->setRowData("\nrua", '     Machado de Assis');
$sql->setRowData("\nfone", '    (88) 5555');

// Define o critério da seleção
$sql->setCriteria($criteria);

// processa a instrução SQJ
echo $sql->getInstruction();
echo "\n";
