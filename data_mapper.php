<?php
/**
 * Class Product
 * Representa um produto a ser vendido
 */
final class Product
{
    private $description;    // descrição do produto
    private $stock;          // estoque do produto
    private $cost_price;     // preço de custo do produto



    /**
     * Método construtor
     * define alguns valores iniciais
     *  @param $description = descrição do produto
     *  @param $stock = estoque do produto
     *  @param $cost_price = preço de custo do produto
     */
    public function __construct($description, $stock, $cost_price)
    {
        $this->description = $description;
        $this->stock = $stock;
        $this->cost_price = $cost_price;
    }
    
}