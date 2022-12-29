<?php

/**
 * classe ProductGateway
 * implementa a Table Data Gateway
 */
class ProductGateway
{
    /**
     * método insert()
     * insere dados na tabela de produtos
     *  @param $id          = ID do produto
     *  @param $description = descrição do produto
     *  @param $stock       = estoque atual do produto
     *  @param $cost_price  = preço de custo do produto
     */
    function insert($id, $description, $stock, $cost_price)
    {
        // cria a istrução SQL
        $sql = "INSERT INTO products(id, description, stock, cost_price)" . 
                "VALUES('$id', '$description', '$stock', '$cost_price')";

        // instrancia objeto PDO
        $conn = new PDO('sqlite:products.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        // Executa istrução SQL
        $conn->exec($sql);
        unset($conn);
    }

    /**
     * método update()
     * altrera os dados na tabela de produtos
     *  @param $id          = ID do produto
     *  @param $description = descrição do produto
     *  @param $stock       = estoque atual do produto
     *  @param $cost_price  = preço de custo do produto
     */
    function update($id, $description, $stock, $cost_price)
    {
        $sql = "UPDATE products set description = '$description',". 
                       "stock = '$stock', cost_price = '$cost_price'". 
                       "WHERE id = '$id'";
        
        // instrancia objeto PDO
        $conn = new PDO('sqlite:products.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        // Executa istrução SQL
        $conn->exec($sql);
        unset($conn);
    }

    /**
     * método delete()
     * deleta um registro da tabela de produtos
     */
    function delete($id)
    {
        // cria instrução SQL de DELETE
        $sql = "DELETE FROM products WHERE id = '$id'";
        
        // instrancia objeto PDO
        $conn = new PDO('sqlite:products.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        // Executa istrução SQL
        $conn->exec($sql);
        unset($conn);
    }

    /**
     * método getObject()
     * busca um registro da tabela de produtos
     *  @param $id = ID do produto
     */
    function getObject($id)
    {
        // cria instrução SQL de SELECT
        $sql = "SELECT * FROM products WHERE id = '$id'";

        // instrancia objeto PDO
        $conn = new PDO('sqlite:products.db');
        $conn_setAttribute(PDO::ERRMODE_WARNING);

        // Executa istrução SQL
        $result = $conn->query($sql);
        $data = $result->fetch(PDO::FETCH_ASSOC);
        unset($conn);
        return $data;
    }

    /**
     * método getObjects
     * lista todos os registros da tabela
     */
    function getObjects()
    {
        // cria instrução SQL de SELECT
        $sql = "SELECT * FROM products";

        // instrancia objeto PDO
        $conn = new PDO('sqlite:products.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        // Executa istrução SQL
        $result = $conn->query($sql);
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        unset($conn);
        return $data;
    }
}


// Instancia objeto ProductGateway
$gateway = new ProductGateway;

// Insere alguns registros na tabela
$gateway->insert(11, 'Vinho', 10, 10);
$gateway->insert(21, 'Salame', 20, 20);
$gateway->insert(31, 'Queilo', 30, 30);
$gateway->insert(41, 'Cafe', 5, 25);


// Efetua algumas alterações
$gateway->update(11, 'Vinho', 20, 20);
$gateway->update(21, 'Salame', 30, 30);
$gateway->update(31, 'Queijo', 40, 40);

//Exclui o produto 3 
$gateway->delete(1);

//Exibe novamente os regtistros 
echo "Lista de Produtos<br>\n";
print_r($gateway->getObjects());
