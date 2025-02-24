<?php
$host = 'localhost';
$dbname = 'fncash';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>