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

$sql = "INSERT INTO famosos (cod, nome) VALUES
('2', 'ÉMário Quintana'),
('3', 'John Lennon'),
('4', 'Mahatma Gandhi'),
('5', 'Ayrton Senna'),
('6', 'ÉCharlie Chaplin'),
('7', 'Anita Garibald')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>