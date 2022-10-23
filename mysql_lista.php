<?php
$servername = "localhost";
$username = "root";
$password = "ronebolha";
$dbname = "livros";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM famosos";
$result = $conn->query($sql);

if($result)
{
    // Percorre o resultado da pesquisa
    while($row = $result->fetch_assoc())
    {
        echo "cod: " . $row["cod"]. " - Nome: " . $row["nome"]. " - Mysql\n";
    }
}

// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "cod: " . $row["cod"]. " - Nome: " . $row["nome"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }
$conn->close();
?>