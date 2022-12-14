<?php
/**
 * classe TLogger
 * Esta classe provê uma interface abstrata para adefinição de algoritmos de LOG
 */

 abstract class TLogger
 {
    protected $file_name; // local do arquivo de LOG

    /**
     * metodo __construct($file_nome)
     */
    public function __construct($file_name)
    {
        $this->file_name = $file_name;

        // reseta o conteudo do arquivo
        file_put_contents($file_name, '');
    }

    // Define o método write como obrigatório
    abstract function write($message);

 }