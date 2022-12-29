<?php
/**
 * Classe ProductGateway
 * implementa Row Data Gateway
 */
class ProductGateway
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

        echo $sql . "<br>\n";

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

        echo $sql . "<br>\n";

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

        echo $sql . "<br>\n";

        // Instancia objeto PDO
        $conn = new PDO('sqlite:products.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        // Executa instrução SQL
        $conn->exec($sql);
        unset($conn);
    }

    /**
     * Método getObject($id)
     * Carrega um objeto a paartir da tabela de produtos
     */
    function getObject($id)
    {
        // cria instrução SQL de SELECT
        $sql = "SELECT * FROM products WHERE id = {$id}";

        echo $sql . "<br>\n";

        // Instancia objeto PDO
        $conn = new PDO('sqlite:products.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        // Executa consulta SQL
        $result = $conn->query($sql);
        $this->data = $result->fetch(PDO::FETCH_ASSOC);
        unset($conn);
    }
}

// Insere produtos na base de dados
$vinho = new ProductGateway;
$vinho->id  = 24;
$vinho->description = 'Vinho Cabernet';
$vinho->stock = 10;
$vinho->cost_price = 24;
$vinho->insert();

$salame = new ProductGateway;
$salame->id = 22;
$salame->description = 'Salame Sadia';
$salame->stock = 10;
$salame->cost_price = 30;
$salame->insert();

$queijo = new ProductGateway;
$queijo->id = 23;
$queijo->description = 'Queijo Minas';
$queijo->stock = 10;
$queijo->cost_price = 65;
$queijo->insert();

$print = new ProductGateway;

//Recupera um objeto e raliza alteração

$obj = new ProductGateway;
$obj->getObject(18);
$obj->stock = $obj->stock*22;
$obj->description = 'Salaminho Italiano';
$obj->update();

// exclui o produto da tabela
$queijo->delete();


