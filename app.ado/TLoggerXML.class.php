<?php
/**
 * clase TLoggerXML
 * implementa o algoritmo de LOG em XML
 */

class TLoggerXML extends TLogger
{
    /**
     * método write()
     * ecreve uma mensagem no arquivo de LOG
     * @param $message = mensagem a ser escrita
     */
    public function write($message)
    {
        $time = date("d/m/Y H:i:s");
        //Monta a string
        $text = "<log>\n";
        $text .= "   <time>$time</time>\n";
        $text .= "   <message>$message</message>\n";
        $text .= "</log>\n";

        //Adiciona ao final do arquivo
        $handler = fopen($this->file_name, 'a');
        fwrite($handler, $text);
        fclose($handler);
    }
}