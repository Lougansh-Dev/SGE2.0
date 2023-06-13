<?php
$host = 'localhost';
$username = 'seu_usuario';
$password = 'sua_senha';
$database = 'chat_db';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die('Falha na conexão com o banco de dados: ' . $conn->connect_error);
}
?>

