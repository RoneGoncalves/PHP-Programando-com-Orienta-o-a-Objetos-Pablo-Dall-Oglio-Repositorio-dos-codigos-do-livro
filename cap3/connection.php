<?php
 
 /**
 * Função spl_autoload_register(function ($class_name)
 * Carrega uma classe quando ela é necessária, ou seja, quando ela é instanciada pela primeira vez.
 */

spl_autoload_register(function ($class_name) {
    include_once "app.ado/{$class_name}.class.php";
});

//cria a instrução SELECT
$sql = new TSqlSelect;
// define o nome da entidade
$sql->setEntity('famosos');
// Acrescenta colunas à consulta
$sql->addColumn('codigo');
$sql->addColumn('nome');
// Cria o critério de seleção
$criteria = new TCriteria;
// Obtém a pessoa de código '1'
$criteria->add(new TFilter('codigo', '=', 1));
// Atribui o critério de seleção de dados
$sql->setCriteria($criteria);

try
{
    //Abre conexão com a base my_livro (mysql)
    $conn = TConnection::open('my_livro');

    // Executa a instrução SQL
    $result = $conn->query($sql->getInstruction());
    if($result)
    {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        // Exibe os dados resultantes
        echo $row['codigo']. ' - '. $row['nome']. "\n";
    }
    //fecha a conxão
    $conn = null;
}
catch(Exception $e)
{
    // Exibe a mensagem de erro
    print "Erro!: ". $e->getMessage(). "<br/>";
    die();
}

try
{
    //Abre conexão com a base pg_livro (postgres)
    $conn = TConnection::open('pg_livro');

    // Executa a instrução SQL
    $result = $conn->query($sql->getInstruction());
    if($result)
    {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        // Exibe os dados resultantes
        echo $row['codigo']. ' - '. $row['nome']. "\n";
    }
    //fecha a conxão
    $conn = null;
}
catch(Exception $e)
{
    // Exibe a mensagem de erro
    print "Erro!: ". $e->getMessage(). "<br/>";
    die();
}


