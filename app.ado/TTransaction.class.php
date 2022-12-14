<?php
/**
 * classe TTransaction
 * esta classe provê os métodos necessários para manipular transações
 */

 final class TTransaction
 {
    private static $conn;  // conexão ativa
    private static $logger; // objeto de LOG

    /**
     * método __contruct()
     * Está declarado como private para impedir que se crie instâncias de TTransaction
     */
    private function __contruct(){}

    /**
     * método open()
     * Abre uma transação e uma conexão ao BD
     * @param $database = nome do banco de dados
     */
    public static function open($database)
    {
        // Abre uma conexão e armazena na propriedade estática $conn
        if(empty(self::$conn))
        {
            self::$conn = TConnection::open($database);
            // Inicia a transação
            self::$conn->beginTransaction();

            // desliga o log de SQL
            self::$logger = NULL;
        } 
    }

    /**
     * método get()
     * retorna a conexão ativa da trasação
     */
    public static function get()
    {
        //retorna a conexão ativa
        return self::$conn;
    }

    /**
     * método rollback()
     * desfaz todas as operações realizadas na transação
     */
    public static function rollback()
    {
        if(self::$conn)
        {
            // Desfaz as opewrações realizadasd durante a transação
            self::$conn->rollback();
            self::$conn = null;
        }
    }

    /**
     * método close()
     * Aplica todas as operações realizadas e fecha a transação
     */

    public static function close()
    {
        if(self::$conn)
        {
            // aplica as operações realizadas durantye a transação
            self::$conn->commit();
            self::$conn = null;
        }  
    }

    /**
     * método setLogger()
     * Define qual estratégia (algoritmo de LOG será usada)
     */
    public static function setLogger(TLogger $logger)
    {
        self::$logger = $logger;
    } 

    /**
     * método log()
     * armazena umamensagem no arquivo de LOG
     * gaseada na estratégia ($logger) atual
     */
    public static function log($message)
    {
        // Verifica se exite um logger
        if(self::$logger)
        {
            self::$logger->write($message);
        }
    }
}
