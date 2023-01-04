<?php
// Abre a conexão com o Postgres
$conn = pg_connect("host=localhost port=5432 dbname=livros user=ronaldo password=admin");
// Insere registros
pg_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (1, 'Érico Verissimo')");
pg_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (2, 'John Lennon')");
pg_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (3, 'Mahatma Gandhi')");
pg_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (4, 'Ayrton Senna')");
pg_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (5, 'Charlie Chaplin')");
pg_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (6, 'Anita Garibaldi')");
pg_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (7, 'Mário Quintana')");

// Fecha a conecxão
pg_close($conn);
?>