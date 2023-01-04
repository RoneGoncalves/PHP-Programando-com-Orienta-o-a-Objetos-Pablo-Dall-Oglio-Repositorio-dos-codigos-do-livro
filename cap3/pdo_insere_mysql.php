<?php

$servername = "localhost";
$username = "root";
$password = "ronebolha";
$dbname = 'livros';
$port = 3307;

    try{
        // Instancia um objeto PDO, conectando ao postgresql
        $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // executa uma série de instruções SQL
        $conn->exec("INSERT INTO famosos(cod, nome) VALUES(106, 'Romario')");
        $conn->exec("INSERT INTO famosos(cod, nome) VALUES(107, 'Ronaldo Fenomeno')");
        $conn->exec("INSERT INTO famosos(cod, nome) VALUES(108, 'Ronaldinho Gaucho')");
        $conn->exec("INSERT INTO famosos(cod, nome) VALUES(109, 'Neymar')");
        $conn->exec("INSERT INTO famosos(cod, nome) VALUES(110, 'Rone Gonçalves')");
        $conn->exec("INSERT INTO famosos(cod, nome) VALUES(111, 'Gruzeiro Esporte Clube')");

        // var_dump($conn);
        // print("Inserção realizada com sucesso!");

        $conn = NULL;

        //print("Inserção realizada com sucesso!");
    }
    catch (PDOExceptiuon $e)
    {
        // Caso ocorra uma exceção, exibir na tela
        print "Erro ao conctar ao banco!: ". $e->getMessage(). "\n";
        die();
    }
?>