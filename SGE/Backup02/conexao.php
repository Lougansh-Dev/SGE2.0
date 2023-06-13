<?php

$host = "localhost";
$usuario = "everaldo";
$senha = "slackware";
$banco = "SGE";

$connection = new mysqli($host, $usuario, $senha, $banco);

if ($connection->connect_errno) {
  echo "Falhou ao conectar ao banco: " . $connection->connect_error;
  exit();
}

?>

