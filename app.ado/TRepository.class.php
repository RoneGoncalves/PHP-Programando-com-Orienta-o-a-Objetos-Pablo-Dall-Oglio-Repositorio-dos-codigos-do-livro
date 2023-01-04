<?php
/**
 * classe TRepository
 * Esta classe provê os métodos necessários para manipular coleções de objetos 
 */
final class TRepository
{
    private $class; // Nome da classe manipulada pelo repositório

    /**
     * Método __construct()
     * instancia um Repositório de objetos
     *  @param $class = Classe dos objetos
     */
    function __construct($class)
    {
        $this->class($class);
    }

    /**
     * Método load()
     * Recuperar um consjunto de objetos (collection) da base de dados
     * através de um critério de seleção, e instanciá-los em memória 
     *  @param $criteria = objeto do tipo TCriteria
     */
    function load(TCriteria $criteria)
    {
        // instancia a instrução SELECT
        $sql = new TSqlSelect;
        $sql->addColumn('*');
        $sql->setEntity($this->class);

        // Atribui o critério passado como parâmetro
        $sql->setCriteria($criteria);

        // Obtém transação ativa
        if($conn = TTransaction::get())
        {
            // Registra mensagem de LOG
            TTransaction::log($sql->getInstruction());

            // Executa a consulta no BD
            $result = $conn->Query($sql->getInstruction());

            if($result)
            {
                // Percorre os resultados da consulta, retornando um objeto
                while($row = $result->fetchObject($this->class. 'Record'))
                {
                    // armazena no array $result
                    $result[] = $row;
                }
            }
            return $result;
        }
        else
        {
            // Se não tiver transação aberta, retorna uma exceção
            throw new Exception('Não há transação ativa!!');
        }
    }

    /**
     * método delete()
     * Exclui um conjunto de objetos (collection) da base de dados
     * através de um critério de seleção
     *  @param = $criteria = objetodo tipo TCriteria
     */
    function delete(TCriteria $criteria)
    {
        // Instacia instrução DELETE
        $sql = new TSqlDelete;
        $sql->setEntity($this->class);

        // Atribui o critério passado como parâmetro
        $sql->setCriteria($criteria);

        // obtém transação ativa
        if($conn = TTransaction::get())
        {
            // registra mensagem de log
            TTransaction::log($sql->getInstruction());

            // executa intrução dDELETE
            $result = $conn->exec($sql->getInstruction());

            return $result;
        }
        else
        {
            // Se não tiver transação aberta, retorna uma exceção
            throw new Exception('Não há transação ativa!!');
        }
    }

    /**
     * método count()
     * Retorna a quantidade de objetos da base de dados
     * que satisfazem um determinado critério de seleção.
     *  @param $criteria = objeto do tipo TCriteria
     */
    function count(TCriteria $criteria)
    {
        // instancia instrução SELECT
        $sql = new TSqlSelect;
        $sql->addColumn('count(*)');

        // atribui o critério passado como parâmetro
        $sql->setCriteria($criteria);

        //obtém transação ativa
        if($conn = TTransaction::get())
        {
            // registra mensagem de LOG
            TTransaction::log($sql->getInstruction());

            // executa instrução de SELECT
            $result = $conn->Query($sql->getInstruction());
            
            if($result)
            {
                $row = $result->fetch();
            }
            //retorna o resultado
            return  $row[0];
        }
        else
        {
            // Se não tiver transação aberta, retorna uma exceção
            throw new Exception('Não há transação ativa!!');
        }
    }
}