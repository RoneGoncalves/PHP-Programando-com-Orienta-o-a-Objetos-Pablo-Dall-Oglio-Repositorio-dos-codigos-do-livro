<?php
// Abre a conexão com o banco
$conn = pg_connect("host=localhost port=5432 dbname=livros user=ronaldo password=admin");

// Define consulta que será realizada
$query = 'SELECT * FROM famosos';

// Envia a consulta ao banco de dados
$result = pg_query($conn, $query);

if($result)
{
    // Percorre o resultado da pesquisa
    while($row = pg_fetch_assoc($result))
    {
        echo $row['codigo']. ' - '. $row['nome']. " - Postgresql\n";
    }
}

// Fecha a conexão com o BD
pg_close($conn);
