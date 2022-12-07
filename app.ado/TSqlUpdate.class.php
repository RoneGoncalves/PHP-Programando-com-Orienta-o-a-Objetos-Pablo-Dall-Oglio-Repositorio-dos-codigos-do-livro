<?php

/**
 * classe TSqlUadate
 * Estas classe provê meios para a amainpulação de uma instrução de update no banco de dados
*/

final class TSqlUpdate extends TSqlInstruction
{
    protected $criteria;

    /**
     * método setRowData()
     * atribui valores á determinadas colunas no banco de dades qie serão modificadas
     * @param $column = coluna da tabela
     * @param $value = valor a ser armazenado
    */

    public function setRowData($column, $value)
    {
        // monta um array indexado pelo nome da coluna
        if(is_string($value))
        {
            // adiciona \ em aspas
            $value = addslashes($value);

            // caso seja outro tipo de dado
            $this->columnValues[$column] = $value;
        }
        else if(is_bool($value))
        {
            // caso seja um boolean
            $this->columnValues[$column] = $value ? 'TRUE' : 'FALSE';
        }
        else if(isset($value))
        {
            // caso seja outro tipo de dado
            $this->columnValues[$column] = $value;
        }
        else{
            // caso seja NUKK
            $this->columnValues[$column] = "NULL";
        }

    }

    /**
     * método getInstruction()
     * retorna a instrução de UPDATE em forma de string
    */

    public function getInstruction()
    {
        // monta a string de update
        $this->sql = "UPDATE {$this->entity}";
        // monta os pares: coluna-valor
        if($this->columnValues)
        {
            foreach($this->columnValues as $column => $value)
            {
                $set[] = "{$column} = '{$value}'";
            }
        }
        $this->sql .= ' SET ' . implode(', ' , $set);

        // retorna a cláusula WHERE do objeto $this->criteria
        if($this->criteria)
        {

            $this->sql .= ' WHERE ' . $this->criteria->dump();
        }

        return $this->sql;
    }

    ///////// CORREÇÂO \\\\\\\\\\\\
    // No livro está faltando esta função
    public function setCriteria($param)
    {
        $this->criteria = $param;
    }

}

