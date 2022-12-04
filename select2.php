<?php

/**
 * Função spl_autoload_register(function ($class_name)
 * Carrega uma classe quando ela é necessária, ou seja, quando ela é instanciada pela primeira vez.
 */

spl_autoload_register(function ($class_name) {
    include_once "app.ado/{$class_name}.class.php";
});

// cria crfitério de seleção de dados
$criteria1 = new TCriteria;
// seleciona todas aa meininas (F) que estão na terceira série (3)
$criteria1->add(new TFilter('sexo', 'like','F'));
$criteria1->add(new TFilter('serie', 'like', '3'));

// seleciona todos o meninos (M) que estão na quaarta serie (4)
$criteria2 = new TCriteria;
$criteria2->add(new TFilter('sexo', 'like','M'));
$criteria2->add(new TFilter('serie', 'like', '4'));

// agora juntamos os dois critérios utilizando o operador lògico OR (ou).
// O resultado deve conter "meninas da 3º série ou meninos da 4º serie.

$criteria = new TCriteria;
$criteria->add($criteria1, TExpression::OR_OPERATOR);
$criteria->add($criteria2, TExpression::OR_OPERATOR);
// define o ordenameanto
$criteria->setProperty('order', 'nome');

// define o intervalo de consulta
$criteria->setProperty('offset', 0);
$criteria->setProperty('limit', 0);
// define o ordenamento da consulta
$criteria->setProperty('order', 'nome');


// Cria a instrtução SELECT
$sql = new TSqlSelect;
// define o nome da entidade
$sql->setEntity('aluno');
// acrescenta todas as colunas a consulta
$sql->addColumn('*');
// define o critério de seleção de dados
$sql->setCriteria($criteria);

// processa a instrução SQL
echo $sql->getInstruction();
echo "<br>\n";



