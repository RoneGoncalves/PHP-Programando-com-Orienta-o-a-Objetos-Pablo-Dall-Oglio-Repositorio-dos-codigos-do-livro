<?php

/**
 * classe TSqlInsert
 * Esta classe provê mneios para a manipulação de instrução de INSERT mo banco de dados
*/

final class TSqlInsert extends TSqlInstruction
{
    /**
     * método setRowData()
     * Atibui valores à determinadas colunas no banco de dados que serão inseridas 
     * @param $column = coluna da tabela
     * @param $value = volor a ser armazenado
    */

    public function setRowData($column, $value)
    {
        // monta um array indexado pelo nome da coluna
        if(is_string($value))
        {
            // adiciona \ em aspas
            $value = addslashes($value);
            // caso seja uma string
            $this->columnValues[$column] = "'$value'";
        }
        else if (is_bool($value))
        {
            // caso seja um boolean
            $this->columnValues[$column] = $value? 'TRUE' : 'FALSE';

        }
        else if(isset($value))
        {
            // cso seja outro tipo de dado
            $this->columnValues[$column] = $value;
        }
        else
        {
            // caso seja NULL
            $this->columnValues[$column] = 'NULL';
        }

    }

    /**
     * método setCriteria()
     * não existe no contexto desta classe, logo, irá lançar um erro se for executado
    */

    public function setCriteria()
    {
        // lança o erro
        throw new Exception("Cannot call setCriteria from ". __CLASS__);
    }

    /**
     * método getInstruction()
     * retorna a insstrução de INSERT em foprma de string
    */

    public function getInstruction()
    {
        $this->sql = "INSERT INTO {$this->entity} (";
        // monta uma string contendo os nomes de colunas
        $column = implode(', ', array_keys($this->columnValues));
        // monta uma string contendo os valores
        $value = implode(', ', array_values($this->columnValues));
        $this->sql .= $column. ')';
        /////////-----CORREÇÂO-----\\\\\\\\\\\\
        // No livro a linha a seguir está com a variavel $value no plural, "$Values"  
        //// ------> $this->sql .= "\nVALUES ({$values})"; <---------
        $this->sql .= "\nVALUES ({$value})";

        return $this->sql;
    } 

}