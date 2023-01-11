<?php

/**
 * função __autoLoad()
 * carrega uma classe quando ela é necessaria, ou seja, quando ela é instanciada pela primeira vez.
 
*/

spl_autoload_register(function ($class_name) {
    include_once "../app.ado/{$class_name}.class.php";
});

// define o LOCALE do sistema, para permitir ponto decimal.
// no Windows usar "english"
setlocale(LC_NUMERIC, 'POSIX');

// cria uma instancia de INSERT
$sql = new TSqlInsert;
// define o nome da entidade
$sql->setEntity('aluno');
// atribui o valor de cada coluna
$sql->setRowData('id', '3');
$sql->setRowData('nome', 'Pedro Cardoso');
$sql->setRowData('fone', '(88) 4444-7777');
$sql->setRowData('nascimento', '1985-04-12');
$sql->setRowData('sexo', 'M');
$sql->setRowData('seri', '4');
$sql->setRowData('mesalidade', 280.40);

// processa a instrução sql
echo $sql->getInstruction();
echo "<br>\n";