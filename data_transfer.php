<?php
/**
 * classe ProductGateway
 * implementa Table Data Gateway com Data Transfer Object
 */

 class ProductGateway
 {
    /**
     * método insert()
     * insere dados na tabela de Podutos
     *  @param $object = objeto a ser inserido
     */
    function insert(Product $object)
    {
        // cria instrução SQL de insert
        $sql = "INSERT INTO products (id, description, stock, cost_price)" .
                "Values ('$object->id', '$object->description', '$object->stock', '$object->cost_price')";

        // Instancia objeto PDO
        $conn = new PDO('sqlite:products.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        // Executa instrução SQL
        $conn->exec($sql);
        unset($conn);
    }

    /**
     * Método update()
     * altera os dados da tabela de produtos
     *  @param $object = objeto a ser alterado
     */
    function update(Product $object)
    {
        // Cria instrução SQL de UPDATE
        $sql = "UPDATE products set" . 
               "   description = '$object->description', " . 
               "   stock = '$object->stock', " . 
               "   cost_price = '$object->cost_price' " . 
               "   WHERE id = '$object->id'" ;
        
        // Instancia objeto PDO
        $conn = new PDO('sqlite:products.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        // Executa instrução SQL
        $conn->exec($sql);
        unset($conn);
    }

    /**
     * Método getObject()
     * busca um registro da tabela de produtos
     *  @param $id = ID do produto
     */
    function getObject($id)
    {
        // cria instrução SQL
        $sql = "SELECT * FROM products WHERE id = '$id'";

        // Instancia objeto PDO
        $conn = new PDO('sqlite:products.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        //executa consulta SQL
        $result = $conn->query($sql);
        $data = $result->fetch(PDO::FETCH_ASSOC);
        unset($conn);
        return $data;
    }
}

class Product
{
    public $id;
    public $description;
    public $stock;
    public $cost_price;
}

// Instancia objeto ProductGateway
$gateway = new ProductGateway;


// instancia objeto ProductGateway
$vinho = new Product;
$vinho->id = 16;
$vinho->description = 'Vinho';
$vinho->stock = 10;
$vinho->cost_price = 30;

// inserre o objeto no banco de dados
$gateway->insert($vinho);

// exibe o objeto de codigo 10
print_r($gateway->getObject(16));

$vinho->description = "Vinho Malbeck";
$vinho->cost_price = 28;
// Atualiza o objeto no banco de dados
$gateway->update($vinho);

// exibe o objeto de codigo 10
print_r($gateway->getObject(16));


