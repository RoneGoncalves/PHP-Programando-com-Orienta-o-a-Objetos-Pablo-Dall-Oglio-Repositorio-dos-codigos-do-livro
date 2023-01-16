<?php
/**
 * classe TTable
 * responsavel pela exibição de tabelas
 */
class TTable extends TElement
{
    /**
     * método construtor
     * instancia uma nova tabela
     */
    public function __construct()
    {
        parent::__construct('table');
    }

    /**
     * método addRow
     * agrega um novo aobjeto linha (TTableRow) na tabela
     */
    public function addRow()
    {
        // instancia objeto linha
        $row = new TTableRow;

        // armazena o array as linhas
        parent::add($row);
        return $row;
    } 
}