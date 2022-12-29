<?php
/**
 * Classe Product
 * implementa Row Data Gateway
 */
class Product
{
    private $data;

    function __get($prop)
    {
        return $this->data[$prop];
    }

    function __set($prop, $value)
    {
        $this->data[$prop] = $value;
    }

    /**
     * Método insert
     * armazena o objeto na tabela de produtos
     */
    function insert()
    {
        // cria instrução SQL de insert
        $sql = "INSERT INTO products (id, description, stock, cost_price)" . 
                "VALUES ('{$this->id}', '{$this->description}', '{$this->stock}', '{$this->cost_price}')";

        //echo $sql . "<br>\n";

        // Instancia objeto PDO
        $conn = new PDO('sqlite:products.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        // Executa instrução SQL
        $conn->exec($sql);
        unset($conn);
    }

    /**
     * método update
     * altera os dados do objheto na tabela de produtos
     */
    function update()
    {
        // cria a instrução SQL UPDATE
        $sql = "UPDATE products set " . 
               "   description = '{$this->description}'," . 
               "   stock = '{$this->stock}'," . 
               "   cost_price = '{$this->cost_price}'" . 
               "   WHERE id = '{$this->id}'";

        //echo $sql . "<br>\n";

        // Instancia objeto PDO
        $conn = new PDO('sqlite:products.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        // Executa instrução SQL
        $conn->exec($sql);
        unset($conn);
    }

    /**
     * Método delete
     * deleta o objeto da tabela de produtos
     */
    function delete()
    {
        // cria a instrução SQL
        $sql = "DELETE FROM products WHERE id = '{$this->id}'";

        //echo $sql . "<br>\n";

        // Instancia objeto PDO
        $conn = new PDO('sqlite:products.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        // Executa instrução SQL
        $conn->exec($sql);
        unset($conn);
    }

    /**
     *  Método registerPurchase($quantity, $cost_price)
     *  Registra uma compra, atualiza custo e incrementa o estoque atual
     *  @param $quantity = quantidade adiquirida
     *  @param $cost_price = novo preço de custo
     */
    public function registerPurchase($quantity, $cost_price)
    {
        $this->cost_price = $cost_price;
        $this->stock += $quantity;
    }

    /**
     * Método registerSale($quantity)
     * Registra uma venda e decrementa o estoque
     *  @param $quantity = unidades vendidas
     */
    public function registerSale($quantity)
    {
        $this->stock -= $quantity;
    }

    /**
     * Método calcSalePrice()
     * retorna o preço de venda, baseado em uma margem de 30% sobre o custo
     */
    public function calcSalePrice()
    {
        return $this->cost_price * 1.3;
    }
}


// Insere produtos na base de dados
$vinho = new Product;
$vinho->id  = 1;
$vinho->description = 'Vinho Cabernet';
$vinho->stock = 10;
$vinho->cost_price = 24;
$vinho->insert();

$salame = new Product;
$salame->id = 2;
$salame->description = 'Salame Sadia';
$salame->stock = 10;
$salame->cost_price = 30;
$salame->insert();

$queijo = new Product;
$queijo->id = 3;
$queijo->description = 'Queijo Minas';
$queijo->stock = 10;
$queijo->cost_price = 65;
$queijo->insert();


$vinho->registerSale(5);
echo 'Estoque vinho  ' . $vinho->stock . "<br>\n";
echo 'Preço de Custo  vinho ' . $vinho->cost_price . "<br>\n";
echo 'Preço de Venda  vinho ' . $vinho->calcSalePrice() . "<br>\n";
$vinho->update();


$queijo->registerPurchase(10, 25);
$queijo->update();
echo 'Estoque queijo  ' . $queijo->stock . "<br>\n";
echo 'Preço de Custo  queijo ' . $queijo->cost_price . "<br>\n";
echo 'Preço de Venda  queijo ' . $queijo->calcSalePrice() . "<br>\n";

$salame->registerPurchase(10, 50);
echo 'Estoque  salame ' . $salame->stock . "<br>\n";
echo 'Preço de Custo  salame ' . $salame->cost_price . "<br>\n";
echo 'Preço de Venda   salame' . $salame->calcSalePrice() . "<br>\n";
$salame->update();




