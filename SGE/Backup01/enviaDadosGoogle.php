<?php

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


mysqli_close($connection);


foreach ($alunos as $aluno) {
    $turma = $aluno['turma'];
    $nome = $aluno['nome'];

    // Exibir os dados na tela
    echo "Turma: " . $turma . ", Nome: " . $nome . "<br>";
}

require_once 'vendor/autoload.php';

use GuzzleHttp\Client;


$exportaUrl = 'http://192.168.100.252/SGE/enviaDadosGoogle.php';


$client = new Client();


$response = $client->get($exportaUrl);

if ($response->getStatusCode() == 200) {
    $dados = $response->getBody(); // Obtenha os dados da resposta

    // Analise os dados obtidos, supondo que estejam em formato JSON
    $alunos = json_decode($dados, true);

    // Autenticação usando as credenciais do arquivo JSON
    $client = new Google_Client();
    $client->setApplicationName('Avaliação Seletiva 2023');
    $client->setScopes([Google_Service_Script::FORMS]);
    
    $client->setAuthConfig('817491460408-pa4jolrnuu7k0vjvt657q7q4244ib1hk.apps.googleusercontent.com');

    $service = new Google_Service_Script($client);

    $formId = '15afe39KpnC_qMPoQVS1Fn6KhmCbGBsJIKlRAOZYLat4';


    foreach ($alunos as $aluno) {
        $turma = $aluno['turma'];
        $nome = $aluno['nome'];


        $request = new Google_Service_Script_ExecutionRequest();
        $request->setFunction('formSubmit');
        $request->setParameters([$formId, $turma, $nome]);


        $response = $service->scripts->run('1h6s_csRY1aDJGw7AtRPfTOKEYon2wYg9LuEhbuPB7skjfeeWO978KdKM', $request);

        if ($response->getError()) {
            echo "Erro ao preencher o formulário para o aluno: " . $nome . "\n";
        } else {
            echo "Formulário preenchido com sucesso para o aluno: " . $nome . "\n";
        }
    }

    echo "Dados enviados com sucesso para o Google Forms.";
} else {
    echo "Ocorreu um erro ao obter os dados do servidor local.";
}
?>

