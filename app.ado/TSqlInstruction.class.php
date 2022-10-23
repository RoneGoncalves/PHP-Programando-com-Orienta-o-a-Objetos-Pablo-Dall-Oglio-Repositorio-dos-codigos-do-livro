<?php

/**
 * classe TSqlInstructions
 *  Esta classe provê os métodos em comum entre todas instruções
 *  SQL (SELECT, INSERT, DELETE e UPDATE)
 */

abstract class TSqlInstruction
{
    protected $sql;  // armazena a instrução SQL
    protected $criteria; // armazena o objeto critério

    /**
     * método serEntry()
     * defeine o nome da entidade (tabela) manipulada pela instrução SQL
     * @param $entity = tabela
    */

    final public function setEntity($entity)
    {
        $this->entity = $entity;
    }

    /**
     * método getEntity()
     * retorna o nome da entidade (tabela)
    */

    final public function getEntity()
    {
        return $this->entity;
    }

    /**
     * método getInstruction()
     * declarando-o como <abstract> obrigamos sua declaração mas classes filhas,
     * uma vez que seu comportamento será  distinto em cada uma delas, configurando polimorfismo.
    */

    abstract function getInstruction();
    
}

