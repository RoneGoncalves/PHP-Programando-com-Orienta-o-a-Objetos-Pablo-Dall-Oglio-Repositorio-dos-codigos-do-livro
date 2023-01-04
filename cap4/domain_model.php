<?php

/**
 * class Product
 * representa um produto a ser vendido
 */
final class Product
{
    private $description;  // descrição do produto
    private $stock;        // estoque atual
    private $cost_price;   //  preço de custo  

    /**
     * método construtor
     * define alguns valores
     *  @param $description = descrição do produto
     *  @param $stock       = estoque atual do produto
     *  @param $cost_price  = preço de custo do produto
     */
    public function __construct($description, $stock, $cost_price)
    {
        $this->description = $description;
        $this->stock       = $stock;
        $this->cost_price  = $cost_price;
    }


    /**
     * método registerPurchase()
     * registra uma compra, atualiza custos e incrementa o estoque atual
     *  @param $unites = unidades adquiridas
     *  @param $cost_price = novo preço de custo
     */
    public function registerPurchase($unites, $cost_price)
    {
        $this->cost_price = $cost_price;
        $this->stock += $unites;
    }

    /**
     * método regsterSale()
     * registra uma venda e decrementa o estoque
     *  @param $unites = unidades vendidas
     */
    public function regiterSale($unites)
    {
        $this->stock -= $unites;
    }

    /**
     * método getStock()
     * retorna a quantidade em estoque
     */
    public function getStock()
    {
        return $this->stock;;
    }

    /**
     * métoda calcSalePrice()
     * retorna o preço de venda em uma margem de 30% sobre o preço de custo
     */
    public function calcSalePrice()
    {
        return $this->cost_price * 1.3;
    }
}

/**
 * classe Sale
 * representa uma venda de produto
 */
final class Sale
{
    private $items; //Itens da venda

    /**
     * método addItem()
     * adiciona um item à venda
     *  @param $quantity = quantidade vendiada
     *  @param $product  = objeto produto
     */
    public function addItem($quantity, Product $product)
    {
        $this->items[] = array($quantity, $product);
    }

    /**
     * método getItems()
     * retorna o array de itens da venda
     */
    public function getItems()
    {
        return $this->items;
    }
}

$prod_1 = new Product('Vinho', 10, 15);
$prod_2 = new Product('Salame', 20, 20);

// instancia objeto Sale
$sale = new Sale;
// adiciona alguns produtos
$sale->addItem(3, $prod_1); //58.5 
$sale->addItem(2, $prod_2); //52
// Outra forma de instaciar este objeto
$sale->addItem(1, new Product('Queijo', 30, 10)); //13 

/**
 * rotina pra calcula o total de uma venda e diminuir o estoque
 */
$total = 0;

foreach($sale->getItems() as $key => $item)
{
    $quantity = $item[0];
    $product = $item[1];

    // soma o total
    $total += $product->calcSalePrice() * $quantity;
    // diminui o estoque
    $product->regiterSale($quantity);

    //var_dump($item[1]);
}

echo "Total R$ $total";
print_r($sale);