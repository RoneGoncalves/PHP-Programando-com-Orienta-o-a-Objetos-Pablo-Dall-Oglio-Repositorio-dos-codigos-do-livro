<?php
/**
 * Função spl_autoload_register(function ($class_name)
 * Carrega uma classe quando ela é necessária, ou seja, quando ela é instanciada pela primeira vez.
 */
 spl_autoload_register(function ($class_name){
    include_once "../app.widgets/{$class_name}.class.php";
});

// exibe uma mensagem de informação
new TMessage('info', 'Esta ação é inofensiva, isto é só um lembrete');