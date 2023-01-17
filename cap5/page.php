<?php
$option = $_GET['option'];

switch($option)
{
    case 'listar':
    echo 'Listando Registros';
    break;

    case 'incluir':
    echo 'Incluiindo Registros';
    break;

    case 'alterar':
    echo 'Alterando Registros';
    break;

    case 'excluir':
    echo 'Excluindo Registros';
    break;
}