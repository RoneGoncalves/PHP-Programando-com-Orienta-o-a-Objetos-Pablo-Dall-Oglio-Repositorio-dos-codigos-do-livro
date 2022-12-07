<?php
/**
 * classe TConnection
 * gerencias as conexões com bancos de dados atravṕes de arquivos de configuração
 */

final class TConnection
{
    /**
     * método __construct()
     * não existirão instrâncias de TConnection, por isso estamos marcando-o como private
     */
    private function __condtruct(){}

    /**
     * método open()
     * recebe onome do banco de dados e instância o objeto
     */

    public static function open($name)
    {
        // Verifica se existe arquivo de configuração para este banco de dados
        if(file_exists("app.config/{$name}.ini"))
        {
            // Lê o INI e retorna um array
            $db = parse_ini_file("app.config/{$name}.ini");
        }
        else
        {
            // se não existir, lança um erro
            throw new Exception("Arquivo {$name} não encontrado");
        }

        // Lê as informações contidas no arquivo
        $user = $db['user'];
        $pass = $db['pass'];
        $name = $db['name'];
        $host = $db['host'];
        $type = $db['type'];

        // Descobre qual o tipo (driver) de banco de dados a ser utilizado
        switch($type)
        {
            case 'pgsql':
                $conn = new PDO("pgsql:dbname={$name};user={$user};password={$pass};host={$host}");
                break;
            case 'mysql':
                $conn = new PDO("mysql:host={$host}; port=3307;dbname={$name}", $user, $pass);
                break;
            case 'sqlite':
                $conn = new PDO("sqlite:{$name}");
                break;
            case 'ibase':
                 $conn = new PDO("firebird:dbname={$name}", $user, $pass);
                 break;
            case 'oci8':
                 $conn = new PDO("oci:dbname={$name}", $user, $pass);
                 break;
            case'mssql':
                $conn = new PDO("mssql:host={$host},1433;dbname={$name}", $user, $pass);
        }

        // ddifine para que o PDO lance exceções na ocorrência de erros
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Retorna o objeto instanciado
        return $conn;
    }
}