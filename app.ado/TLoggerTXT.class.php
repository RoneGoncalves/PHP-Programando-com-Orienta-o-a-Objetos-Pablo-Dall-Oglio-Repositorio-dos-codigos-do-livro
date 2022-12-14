<?php
/**
 * clase TLoggerTXT
 * implementa o algoritmo de LOG em TXT
 */

class TLoggerTXT extends TLogger
{
    /**
     * método write()
     * ecreve uma mensagem no arquivo de LOG
     * @param $message = mensagem a ser escrita
     */
    public function write($message)
    {
        $time = date("Y-m-d H:i:s");
        //Monta a string
        $text = "$time :: $message\n";

        //Adiciona ao final do arquivo
        $handler = fopen($this->file_name, 'a');
        fwrite($handler, $text);
        fclose($handler);
    }
}