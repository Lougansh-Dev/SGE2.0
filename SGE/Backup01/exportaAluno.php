<?php
// Estabelecer conexão com o banco de dados e executar a consulta SQL
session_start();
include("conexao.php");
include("conf.php");

$alunos = array(); // Array para armazenar os dados dos alunos

$sql = "SELECT turma, nome FROM tb_aluno where ano = 5";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $alunos[] = $row;
    }
}

// Fechar a conexão com o banco de dados

mysqli_close($conn);

// Exibir os dados na tela

foreach ($alunos as $aluno) {
    $turma = $aluno['turma'];
    $nome = $aluno['nome'];
    
    // Exibir os dados na tela
    echo "Turma: " . $turma . ", Nome: " . $nome . "<br>";
}
?>
