<?php

/**
 * class product
 * representa um produto a ser vendido 
 */
final class Product
{
    static $recordset = array();   // representa a nossa estrutura de dados

    /**
     * método addProduct()
     * adiciona um produto ao regisstro
     *  @param $description = descrição do produto
     *  @param $stock = estoque atual
     *  @param $cost_price  = preço de custo
     */
    public function addProduct($id, $description, $stock, $cost_price)
    {
        self::$recordset[$id]['description'] = $description;
        self::$recordset[$id]['stock'] = $stock;
        self::$recordset[$id]['cost_price'] = $cost_price;
    }

    /**
     * método registerPurchase()
     * registra uma compra, atualiza custo e incrementa o estoque atual do produto
     *  @param $unites = unidades adquiridas
     *  @param $cost_price = nove preço de custo
     */
    public function registerPurchase($id, $unites, $cost_price)
    {
        self::$recordset[$id]['cost_price'] = $cost_price;
        self::$recordset[$id]['stock'] += $unites;
    }

    /**
     * método registerSale()
     * registra uma venda e decrementa do estoque
     */
    public function registerSale($id, $unites)
    {
        self::$recordset[$id]['stock'] -= $unites;
    }

    /**
     * método getStock
     * retorna a quandidade em estoque 
     */
    public function getStock($id)
    {
        return self::$recordset[$id]['stock'];
    }

    /**
     * método calcSalePrice()
     * retorna o preço de venda, baseado em uma margem de 30% sobre o preço de custo
     */
    public function calcSalePrice($id)
    {
        return self::$recordset[$id]['cost_price'] * 1.3;
    }
} 

// instancia objeto produto
$product = new Product;

// adiciona alguns produtos
$product->addProduct(1, 'Vinho', 10, 15);
$product->addProduct(2, 'Salame', 20, 20);

// Exibe os estoques atuais
echo "ESTOQUES: <br>\n";
echo $product->getStock(1) . "<br>\n";
echo $product->getStock(2) . "<br>\n";

// exibe os preços de venda 
echo "Preços de venda: <br>\n";
echo $product->calcSalePrice(1) . "<br>\n";
echo $product->calcSalePrice(2) . "<br>\n";

// vende algumas unidades
$product->registerSale(1, 5);
$product->registerSale(2, 10);

//repõe o estoque
$product->registerPurchase(1, 5, 16);
$product->registerPurchase(2, 10, 22);

// exibe os preços de venda atuais
echo "Preços de venda: <br>\n";
echo $product->calcSalePrice(1) . "<br>\n";
echo $product->calcSalePrice(2) . "<br>\n";

