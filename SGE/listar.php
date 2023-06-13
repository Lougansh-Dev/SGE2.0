<?php
session_start();
include("conexao.php");
include("conf.php");
menu();

if (isset($_POST['Lista']) && $_POST['Lista'] != '') {
    $ano = substr($_POST['Lista'], 0, 1);
    $turma = substr($_POST['Lista'], 1, 1);
    $titulo = $ano . 'º Ano ' . $turma;

    if ($ano == 'L' && $turma == 'G') {
        //$sql = "SELECT * FROM tb_aluno WHERE situacaoMatricula = 'M' ORDER BY ano, turma, nome";
		$sql = "SELECT a.cgm, a.ano, a.turma, a.nome, a.nascimento, a.sexo, a.situacaoMatricula, a.programacao, a.dataMatricula, a.observacao, a.dificuldade, a.programacao, t.turno
        FROM tb_aluno a
        INNER JOIN tb_turma t ON a.turma = t.turma AND a.ano = t.ano
        WHERE a.situacaoMatricula = 'M' ORDER BY turno, turma, nome ASC";
    } elseif ($ano == 'A' && $turma == 'D') {
        //$sql = "SELECT * FROM tb_aluno WHERE situacaoMatricula = 'M' AND dificuldade = 'S' ORDER BY nome ASC";
		$sql = "SELECT a.cgm, a.ano, a.turma, a.nome, a.nascimento, a.sexo, a.situacaoMatricula, a.programacao, a.dificuldade, a.dataMatricula, a.observacao, a.dificuldade, a.programacao, t.turno
        FROM tb_aluno a
        INNER JOIN tb_turma t ON a.turma = t.turma AND a.ano = t.ano
        WHERE a.situacaoMatricula = 'M' AND dificuldade = 'S' ORDER BY turno, ano, turma, nome ASC";
    } elseif ($ano == 'C' && $turma == 'P') {
        //$sql = "SELECT * FROM tb_aluno WHERE situacaoMatricula = 'M' AND programacao = 'S' ORDER BY nome ASC";
		$sql = "SELECT a.cgm, a.ano, a.turma, a.nome, a.nascimento, a.sexo, a.situacaoMatricula, a.programacao, a.dataMatricula, a.observacao, a.dificuldade, a.programacao, t.turno
        FROM tb_aluno a
        INNER JOIN tb_turma t ON a.turma = t.turma AND a.ano = t.ano
        WHERE a.situacaoMatricula = 'M' AND programacao = 'S' ORDER BY turno, turma, nome ASC";
    } else {
        $sql = "SELECT a.cgm, a.ano, a.turma, a.nome, a.nascimento, a.sexo, a.situacaoMatricula, a.programacao, a.dataMatricula, a.observacao, a.dificuldade, a.programacao, t.turno
        FROM tb_aluno a
        INNER JOIN tb_turma t ON a.turma = t.turma AND a.ano = t.ano
        WHERE a.situacaoMatricula = 'M' AND a.ano = '$ano' AND a.turma = '$turma' ORDER BY turno, turma, nome ASC";
	}
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ss", $ano, $turma);
        $stmt->execute();
        $result = $stmt->get_result();

        $i = 0;
        $lista = '';

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $i++;
            $cgm = $row['cgm'];
            $ano = $row['ano'];
            $turma = $row['turma'];
			$turno = $row['turno'];
            $nome = $row['nome'];
            $nascimento = date("d/m/Y", strtotime($row['nascimento']));
            $sexo = $row['sexo'];
            $situacao = $row['situacaoMatricula'];
            $matriculado = date("d/m/Y", strtotime($row['dataMatricula']));
            $observacao = $row['observacao'];

            $lista .= '
                <tr>
                    <td align="center">' . htmlspecialchars($cgm) . '</td>
                    <td align="center">' . htmlspecialchars($ano) . '</td>
                    <td align="center">' . htmlspecialchars($turma) . '</td>
					<td align="center">' . htmlspecialchars($turno) . '</td>
                    <td>' . htmlspecialchars($nome) . '</td>
                    <td align="center"><a href="editarDireto.php?cgm=' . htmlspecialchars($cgm) . '">Editar</a></td>
                    <td align="center"><a href="info.php?cgm=' . htmlspecialchars($cgm) . '">Informações</a></td>
                </tr>
            ';
        }

        $turmaQTDE = $titulo . ' - ' . $i . ' alunos';
} else {
    $lista = '';
    $turmaQTDE = '';
}

echo '
    <html>
    <head><title> Lista de alunos ' . htmlspecialchars($ano) . 'º' . htmlspecialchars($turma) . '</title></head>
    <body>    
        <form method="POST" action="?id=Lista" onchange="form.submit()">
        <div id="editar">
            <div align="center">
            <h2>Editar Alunos'.$mostraCaixaSuspensa.'</h2>
                '.$turmaQTDE.'
            <hr width="50%">
            ' . htmlspecialchars($hoje) . '
            <hr width="70%"></div>
            <div align="center">
            <table border="1">
            <tr>
                <td align="center">CGM</td>
                <td align="center">Ano</td>
                <td align="center">Turma</td>
				<td align="center">Turno</td>
                <td align="center">Nome</td>
                <td align="center">Editar</td>
                <td align="center">Observação</td>
            </tr>
            ' . $lista . '
            </table>
            </div>
            </div>
        </form>
    </body>
    </html>
';
?>

