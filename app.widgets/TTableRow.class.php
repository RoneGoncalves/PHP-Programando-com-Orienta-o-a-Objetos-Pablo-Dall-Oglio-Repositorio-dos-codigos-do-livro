<?php
/**
 * classe TTableRow
 * reponsavel pela exibição de uma linha de uma tabela
 */
class TTableRow extends TElement
{
    /**
     * método construtor
     * instancia umanova linha
     */
    public function __construct()
    {
        parent::__construct('tr');
    }

    /**
     * método addCell()
     * agrega umnovo objeto célula (TTableCell) à linha
     *  @param $value = conteudo da célula
     */
    public function addCell($value)
    {
        // instancia objeto célula
        $cell = new TTableCell($value);
        parent::add($cell);
        
        // retorna o objeto instanciado
        return $cell;
    }

}