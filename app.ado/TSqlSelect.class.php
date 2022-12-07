<?php
/**
 * classe TSqlSelect
 * Esta classe provê meios para a manipulação de uma instrução de SELECT no banco de dados
 */

final class TSqlSelect extends TSqlInstruction
{
    private $columns;

    /**
     * metodo addColumn()
     * adiciona uma coluna a ser retornada peli SELECT
     * @param $column = coluna da tabela
     */
    public function addColumn($column)
    {
        // Adiciona a coluna no array
        $this->columns[] = $column;
    }

    /**
     * metodo getIntruction()
     * retorna a instrução de SELECT em forma de string
     */
    public function getInstruction()
    {
        // monta a instrução se SELECT
        $this->sql = 'SELECT ';
        // monta string com os nomes de colunas
        $this->sql .= implode(' , ', $this->columns);
        // adiciona na cláusula FROM o nome da tabela
        $this->sql .= ' FROM '. $this->entity;

        // obtém a cláusula WHERE do obleto criteri.
        if ($this->criteria)
        {
            $expression = $this->criteria->dump();
            if ($expression)
            {
                $this->sql .= ' WHERE '. $expression;
            }

            // obtém as propriedades do critério
            $order = $this->criteria->getProperty('order');
            $limit = $this->criteria->getProperty('limit');
            $offset = $this->criteria->getProperty('offset');

            // obtém a ordenação do SELECT

            if ($order)
            {
                $this->sql .=  ' ORDER BY '. $order;
            }

            if ($limit)
            {
                $this->sql .=  ' LIMIT '. $limit;
            }

            if ($offset)
            {
                $this->sql .= ' OFFSET '. $offset;
            }
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