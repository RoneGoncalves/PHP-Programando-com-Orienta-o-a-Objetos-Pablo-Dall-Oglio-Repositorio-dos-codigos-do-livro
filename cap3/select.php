<?php

/**
 * Função spl_autoload_register(function ($class_name)
 * Carrega uma classe quando ela é necessária, ou seja, quando ela é instanciada pela primeira vez.
 */

spl_autoload_register(function ($class_name) {
    include_once "app.ado/{$class_name}.class.php";
});

// cria crfitério de seleção de dados
$criteria = new TCriteria;
$criteria->add(new TFilter('nome', 'like','maria%'));
$criteria->add(new TFilter('cidade', 'like', 'Porto%'));

// define o intervalo de consulta
$criteria->setProperty('offset', 0);
$criteria->setProperty('limit', 10);
// define o ordenamento da consulta
$criteria->setProperty('order', 'nome');


// Cria a instrtução SELECT
$sql = new TSqlSelect;
// define o nome da entidade
$sql->setEntity('aluno');
// acrescenta colunas a consulta
$sql->addColumn('nome');
$sql->addColumn('fone');
// define o critério de seleção de dados
$sql->setCriteria($criteria);

// processa a instrução SQL
echo $sql->getInstruction();
echo "<br>\n";



