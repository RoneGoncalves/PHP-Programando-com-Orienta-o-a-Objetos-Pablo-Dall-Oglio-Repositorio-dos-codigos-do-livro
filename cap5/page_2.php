<?php
/**
 * Função spl_autoload_register(function ($class_name)
 * Carrega uma classe quando ela é necessária, ou seja, quando ela é instanciada pela primeira vez.
 */
 spl_autoload_register(function ($class_name){
    include_once "../app.widgets/{$class_name}.class.php";
});

class Mundo extends TPage
{
    function ola($param)
    {
        echo 'Olá meu amigo '. $param['nome'];
    }
}

$pagina = new Mundo;
$pagina->show();
