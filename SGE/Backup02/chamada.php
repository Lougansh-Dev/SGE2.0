<?php
session_start();
include("conexao.php");
include("conf.php");
menu();

if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
$ano = substr($_POST['Lista'],0,1);
$turma = substr($_POST['Lista'],1,1);
$titulo = $ano.'º Ano '.$turma;
if($ano=='L' && $turma =='G') {
	$sql = "select * from tb_aluno where situacaoMatricula = 'M' order by ano, turma, nome";
}
elseif($ano=='A' && $turma =='D') {
	$sql = "select * from tb_aluno where situacaoMatricula = 'M' and dificuldade = 'S' order by ano, turma, nome asc";
}
elseif($ano=='R' && $turma =='E') {
	$sql = "select * from tb_aluno where situacaoMatricula = 'M' and robotica = 'S' order by ano, turma, nome asc";
}else{
	$sql = "select * from tb_aluno where ano = '$ano' and turma = '$turma' and situacaoMatricula = 'M' order by nome asc";
}
$result = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$i++;
    	$cgm = $row['cgm'];
      	$ano = $row['ano'];
      	$turma = $row['turma'];
		$nome = $row['nome'];
		$nascimento = date("d/m/Y", strtotime($row['nascimento']));
		$sexo = $row['sexo'];
		$situacao = $row['situacaoMatricula'];
		$matriculado = date("d/m/Y", strtotime($row['dataMatricula']));
		$observacao = $row['observacao'];
		$lista = $lista.'
		<tr>
			<td align="center">'.$cgm.'</td>
			<td align="center">'.$ano.'</td>
			<td align="center">'.$turma.'</td>
			<td>'.$nome.'</td>
			<td align="center"></td>
			<td align="center"></td>
			<td align="center"></td>
			<td align="center"></td>
			<td align="center"></td>
			<td align="center"></td>
			<td align="center"></td>
			<td align="center"></td>
			<td align="center"></td>
			<td align="center"></td>

		</tr>
		';
		$_SESSION["alunos"] = $lista;

    }
	$turmaQTDE = $titulo.' - '.$i.' alunos';
}	
	echo '
	<html>
		<head><title> Lista de alunos '.$ano.'º'.$turma.'</title></head>
		<body>	
			<form method="POST" action="?id=Lista" onchange="form.submit()">
			<div id="editar">
				<div align="center">'.$mostraCaixaSuspensa.'
				'.$turmaQTDE.'
				<hr width="50%">
				'.$hoje.'
				<hr width="70%"></div>
				<div align="center">
				<table border="1" width="90%">
				<tr>
					<td align="center" width="4%">CGM</td>
					<td align="center" width="3%">Ano</td>
					<td align="center" width="3%">Turma</td>
					<td align="center" width="20%">Nome</td>
					<td align="center" width="7%"></td>
					<td align="center" width="7%"></td>
					<td align="center" width="7%"></td>
					<td align="center" width="7%"></td>
					<td align="center" width="7%"></td>
					<td align="center" width="7%"></td>
					<td align="center" width="7%"></td>
					<td align="center" width="7%"></td>
					<td align="center" width="7%"></td>
					<td align="center" width="7%"></td>

				</tr>
				'.$_SESSION["alunos"].'
				</table>
				</div>
				</div>
			</form>
		</body>
	</html>
	';
?>
