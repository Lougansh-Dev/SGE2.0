<?php
include 'chatConexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receber os dados enviados via POST
    $sender = $_POST['sender'];
    $message = $_POST['message'];

    // Inserir a mensagem no banco de dados
    $sql = "INSERT INTO messages (sender, message) VALUES ('$sender', '$message')";
    if ($connection->query($sql) === true) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar a mensagem: " . $connection->error;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Consultar as mensagens do banco de dados
    $sql = "SELECT * FROM messages ORDER BY created_at ASC";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $messages = array();

        while ($row = $result->fetch_assoc()) {
            $message = array(
                'sender' => $row['sender'],
                'message' => $row['message']
            );

            $messages[] = $message;
        }

        // Retornar as mensagens como resposta em formato JSON
        echo json_encode($messages);
    } else {
        // Não há mensagens no banco de dados
        echo "Não há mensagens";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Bate-Papo</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Função para enviar uma mensagem ao servidor
            function enviarMensagem() {
                var sender = $("#sender").val();
                var message = $("#message").val();

                $.ajax({
                    url: "chatOnline.php",
                    method: "POST",
                    data: { sender: sender, message: message },
                    success: function(response) {
                        // Limpa o campo de mensagem após o envio
                        $("#message").val("");
                        // Atualiza a exibição das mensagens
                        exibirMensagens();
                    }
                });
            }

            // Função para exibir as mensagens do servidor
            function exibirMensagens() {
                $.ajax({
                    url: "chatOnline.php",
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        // Limpa o elemento de exibição das mensagens
                        $("#chat-messages").empty();
                        // Adiciona as mensagens recebidas ao elemento de exibição
                        $.each(response, function(index, message) {
                            $("#chat-messages").append("<p><strong>" + message.sender + ":</strong> " + message.message + "</p>");
                        });
                    }
                });
            }

            // Manipulador de eventos para enviar mensagem ao clicar no botão
            $("#send-button").click(function() {
                enviarMensagem();
            });

            // Atualiza as mensagens periodicamente a cada 2 segundos
            setInterval(function() {
                exibirMensagens();
            }, 2000);
        });
    </script>
</head>
<body>
    <h1>Sistema de Bate-Papo</h1>

    <div id="chat-messages"></div>

    <label for="sender">Remetente:</label>
    <input type="text" id="sender">

    <label for="message">Mensagem:</label>
    <input type="text" id="message">

    <button id="send-button">Enviar</button>
</body>
</html>

