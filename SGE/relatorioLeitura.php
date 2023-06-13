<?php
include("conexao.php");
include("conf.php");
menu();

$sql = "SELECT a.cgm, a.ano, a.turma, a.nome, a.nascimento, a.sexo, a.situacaoMatricula, a.dataMatricula, a.observacao, a.dificuldade, a.programacao, a.leitura, t.turno
        FROM tb_aluno a
        INNER JOIN tb_turma t ON a.turma = t.turma AND a.ano = t.ano where a.ano >= 3 order by a.ano, a.turma, a.nome";		
$result = mysqli_query($connection, $sql);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
    $ID = $row['ID'];
    $ano = $row['ano'];
    $turma = $row['turma'];
    $nome = $row['nome'];
    $nascimentp = $row['nascimento'];
    $sexo = $row['sexo'];
    $status = $row['status'];
    $situacaoMatricula = $row['situacaoMatricula'];
    $dataMatricula = $row['dataMatricula'];
    $observacao = $row['observacao'];
    $programacao = $row['programacao'];
	$leitura = $row['leitura'];
	if ($leitura == "O") {
			$relLeituraOtimo = $relLeituraOtimo.$ano.'º'.$turma.' - '.$nome.'<br>';
		} elseif ($leitura == "B") {
			$relLeituraBom = $relLeituraBom.$ano.'º'.$turma.' - '.$nome.'<br>';
		} elseif ($leitura == "R") {
			$relLeituraRuim = $relLeituraRuim.$ano.'º'.$turma.' - '.$nome.'<br>';
		} elseif ($leitura == "N") {
			$relLeituraNaoLe = $relLeituraNaoLe.$ano.'º'.$turma.' - '.$nome.'<br>';
		} else {
			$relLeituraFaltaAvaliar = $relLeituraFaltaAvaliar.$ano.'º'.$turma.' - '.$nome.'<br>';
		}
}
echo '
<h1 align="center">Relatório de Avaliação de Leitura</h1>
<h3>Alunos que apresentaram ótima leitura</h3>
<p>'.$relLeituraOtimo.'</p>
<h3>Alunos que apresentaram boa leitura</h3>
<p>'.$relLeituraBom.'</p>
<h3>Alunos que apresentaram leitura ruim</h3>
<p>'.$relLeituraRuim.'</p>
<h3>Alunos que não sabem ler</h3>
<p>'.$relLeituraNaoLe.'</p>
<h3>Alunos não avaliados</h3>
<p>'.$relLeituraFaltaAvaliar.'</p>
';
?>
