<?php
$servername = "localhost";
$username = "ronaldo";
$password = "admin";
$dbname = 'livros';
$port = 5432;

try
{
    // Instancia um objeto PDO, conectando ao postgresql
    $conn = new PDO("pgsql:host=$servername;port=$port;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Envia a consulta ao banco de dados
    $result = $conn->query("SELECT * FROM famosos");

    if($result)
    {
        // Percorre o resultado da pesquisa
        while ($row = $result->fetch(PDO::FETCH_OBJ))
        {
            echo $row->codigo. ' - '. $row->nome. "\n";
        }
    }

    // Fecha a conexão com o BD
    $conn =NULL;
}
catch (PDOExceptiuon $e)
{
    // Caso ocorra uma exceção, exibir na tela
    print "Erro ao conctar ao banco!: ". $e->getMessage(). "\n";
    die();
}

?>