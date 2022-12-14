<?php
/**
 * clase TLoggerHTML
 * implementa o algoritmo de LOG em HTML
 */

class TLoggerHTML extends TLogger
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
        $text = "<p>\n";
        $text .= "   <b>$time</b> : \n";
        $text .= "<i>$message</i> <br>\n";
        $text .= "</p>\n";

        //Adiciona ao final do arquivo
        $handler = fopen($this->file_name, 'a');
        fwrite($handler, $text);
        fclose($handler);
    }
}