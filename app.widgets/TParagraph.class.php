<?php
/**
 * classe nTParagraph
 * classe pra exibição de paragrafos
 */
class TParagraph extends TElement
{
    /**
     * método construtor
     * instancia objeto TParagraph
     *  @param $text = texto a ser exbido
     */
    public function __construct($text)
    {
        parent::__construct('p');

        // atribui o conteúdo ao texto
        parent::add($text);
    }

    /**
     * método setAlign()
     * define o alinhamento do texto
     *  @param $align = alinhamento do texto
     */
    function setAlign($align)
    {
        $this->align = $align;
    } 
}