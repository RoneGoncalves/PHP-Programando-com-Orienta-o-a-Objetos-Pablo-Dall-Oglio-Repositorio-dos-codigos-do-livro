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

    /**
     * Método getDescription()
     * retorna a descrição do produto
     */
    public  function getdescription()
    {
        return $this->description;
    }
}

/**
 * Classe Sale
 * representa uma venda de produtos
 */
final class Sale
{
    private $id;
    private $items;

    /**
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Método getId()
     * retorna o identificador
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * Método addItem()
     * adiciona um item na cesta
     *  @param $quantity = quantidade vendida
     *  @param $product = objeto produto
     */
    public function addItem($quantity, Product $product)
    {
        $this->items[] = array($quantity, $product);
    }

    /**
     * Método getItems()
     * retorna o array de itens da cesta
     */
    public  function getItems()
    {
        return $this->items;
    }
}

/**
 * Classe SaleMapper
 *implementa Data Mapper para a classe Venda
 */
final class SaleMapper
{
    function insert(Sale $sale)
    {
        $id = $sale->getId();
        $date = date("d/m/Y");

        // Insere a venda no banco de dados
        $sql = "INSERT INTO sale (id, date) VALUES ('$id', '$date')";
        echo $sql . "<br>\n";

        // percorre os itens vendidos
        foreach ($sale->getItems() as $item)
        {
            $quantity = $item[0];
            $product = $item[1];
            $description = $product->getDescription();

            //insere os itens da venda no banco de dados
            $sql = "INSERT INTO sale_items(ref_sale, product, quantity)" .
                "VALUES ('$id', '$description', '$quantity')";

            echo $sql . "<br>\n";
        }
    }
}

// instancia objeto Venda
$sale = new Sale(1000);

// adiciona os produtos
$sale->addItem(3, new Product('Vinho', 10, 15));
$sale->addItem(2, new Product('Salame', 20, 20));
$sale->addItem(1, new Product('Queijo', 30, 10));

// Data Mapper persiste a venda
SaleMapper::insert($sale);