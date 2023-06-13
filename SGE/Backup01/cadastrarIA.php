<?php
include("conexao.php");
include("conf.php");
menu();

if (isset($_POST['btnSalvar']) && !empty($_POST['textCGM'])) {
    $cgm = $_POST['textCGM'];
    $ano = $_POST['textAno'];
    $turma = $_POST['textTurma'];
    $nome = $_POST['textNome'];
    $nascimento = $_POST['textAno'] . '-' . $_POST['textMes'] . '-' . $_POST['textDia'];
    $sexo = $_POST['textSexo'];
    $situacao = $_POST['textSituacaoMatricula'];
    $matriculado = $_POST['textAnoMatricula'] . '-' . $_POST['textMesMatricula'] . '-' . $_POST['textDiaMatricula'];
    $observacao = $_POST['textObservacao'];

    $sql = "INSERT INTO tb_aluno (cgm, ano, turma, nome, nascimento, sexo, situacaoMatricula, dataMatricula, observacao) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, 'siissssss', $cgm, $ano, $turma, $nome, $nascimento, $sexo, $situacao, $matriculado, $observacao);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Aluno cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o aluno.";
    }

    mysqli_stmt_close($stmt);
}
?>

<html>
<head>
    <title>Cadastro de aluno</title>
</head>
<body>
    <div align="center">
        <h2>Cadastro de Aluno</h2>
        <hr width="50%">
        <hr width="70%">
    </div>
    <form method="POST" action="?id=18" onsubmit="return validateForm()">
        <div align="center">
            <br>
            <table border="0">
                <tr>
                    <td rowspan="7" align="center" width="315">
                        <hr width="10%">
                        <hr width="30%">
                        <hr width="50%">
                        <img src="../uploads/logoNew.png" width="100">
                        <hr width="50%">
                        <hr width="30%">
                        <hr width="10%">
                    </td>
                </tr>
                <tr>
                    <td align="right" width="116">CGM:</td>
                    <td>
                        <input type="text" size="10" name="textCGM" required> Ano:
                        <input type="text" size="1" name="textAno" required> Turma:
                        <input style="text-align:center" type="text" size="1" name="textTurma" required>
                    </td>
                </tr>
                <tr>
                    <td align="right" width="116">Aluno:</td>
                    <td>
                        <input type="text" size="50" name="textNome" required>
                    </td>
                </tr>
                <tr>
                    <td align="right" width="116">Nascimento:</td>
                    <td>
                        <input style="text-align:center" type="text" size="1" name="textDia" required>
                        <input style="text-align:center" type="text" size="1" name="textMes" required>
                        <input style="text-align:center" type="text" size="3" name="textAno" required>
                    </td>
                </tr>
                <tr>
                    <td align="right" width="116">Sexo:</td>
                    <td>
                        <input type="text" size="1" name="textSexo" maxlength="1" required>
                        Situação da Matricula:
                        <input type="text" size="1" name="textSituacaoMatricula" maxlength="1" required>
                        Data da Matricula:
                        <input style="text-align:center" type="text" size="1" name="textDiaMatricula" required>
                        <input style="text-align:center" type="text" size="1" name="textMesMatricula" required>
                        <input style="text-align:center" type="text" size="3" name="textAnoMatricula" required>
                    </td>
                </tr>
                <tr>
                    <td align="right" width="116">Observações:</td>
                    <td>
                        <textarea rows="10" name="textObservacao" cols="50"></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top">&nbsp;</td>
                    <td valign="top">
                        <input type="submit" value="Salvar" name="btnSalvar">
                    </td>
                </tr>
            </table>
        </div>
    </form>

    <script>
        function validateForm() {
            // Implemente a validação do formulário aqui, se necessário
            // Retorne true para enviar o formulário ou false para impedir o envio
            return true;
        }
    </script>
</body>
</html>

