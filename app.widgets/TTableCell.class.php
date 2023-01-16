<?php
/**
 * classe TTableCell
 * responsavel pela exibição de uma tabela
 */
class TTableCell extends TElement
{
    /**
     * método construtor
     * instancia uma nova célula
     *  @param $value = conteudo da célula
     */
    public function __construct($value)
    {
        parent::__construct('td');
        parent::add($value);
    }
}