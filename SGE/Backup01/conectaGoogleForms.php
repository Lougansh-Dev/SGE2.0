<?php
require_once './biblioteca/google-api-php-client/vendor/autoload.php';
require_once 'caminho/para/seu/vendor/autoload.php';

use GuzzleHttp\Client;

// URL do arquivo de exportação do servidor local
$exportaUrl = 'http://192.168.100.252/SGE/exportaAluno.php';

// Crie um cliente Guzzle
$client = new Client();

// Faça a solicitação GET para obter os dados do servidor local
$response = $client->get($exportaUrl);

if ($response->getStatusCode() == 200) {
    $dados = $response->getBody(); // Obtenha os dados da resposta

    // Analise os dados obtidos, supondo que estejam em formato JSON
    $alunos = json_decode($dados, true);

    // Autenticação usando as credenciais do arquivo JSON
    $client = new Google_Client();
    $client->setApplicationName('Avaliação Seletiva 2023');
    $client->setScopes([Google_Service_Script::FORMS]); // Alterado para o escopo correto

    // Carregue as credenciais do arquivo de credenciais JSON obtido na configuração do Google Apps Script
    $client->setAuthConfig('817491460408-pa4jolrnuu7k0vjvt657q7q4244ib1hk.apps.googleusercontent.com');

    $service = new Google_Service_Script($client);

    $formId = '15afe39KpnC_qMPoQVS1Fn6KhmCbGBsJIKlRAOZYLat4'; // Substitua pelo ID do seu formulário

    // Preencha o formulário com os dados dos alunos
    foreach ($alunos as $aluno) {
        $turma = $aluno['turma'];
        $nome = $aluno['nome'];

        // Crie uma solicitação para enviar a resposta do aluno para o formulário
        $request = new Google_Service_Script_ExecutionRequest();
        $request->setFunction('formSubmit');
        $request->setParameters([$formId, $turma, $nome]);

        // Envie a solicitação para preencher o formulário
        $response = $service->scripts->run('1h6s_csRY1aDJGw7AtRPfTOKEYon2wYg9LuEhbuPB7skjfeeWO978KdKM', $request); // Substitua 'ID_DO_SEU_PROJETO_SCRIPT' pelo ID correto

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
