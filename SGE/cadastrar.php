<?php
include("conexao.php");
include("conf.php");
menu();
if (isset($_POST['btnSalvar']) && $_POST['textCGM'] != ''){
		$cgm = $_POST['textCGM'];
		$ano = $_POST['textAno'];
		$turma = $_POST['textTurma'];
		$nome = $_POST['textNome'];
		$nascimento = $_POST['dataAno'].'-'.$_POST['dataMes'].'-'.$_POST['dataDia'];
		$sexo = $_POST['textSexo'];
		$situacao = $_POST['textSituacaoMatricula'];
		$matriculado = $_POST['textAnoMatricula'].'-'.$_POST['textMesMatricula'].'-'.$_POST['textDiaMatricula'];
		$observacao = $_POST['textObservacao'];
}

$sql = "INSERT INTO tb_aluno 
(cgm, ano, turma, nome, nascimento, sexo, situacaoMatricula, dataMatricula, observacao) 
VALUES 
('$cgm', '$ano', '$turma', '$nome', '$nascimento', '$sexo', '$situacao', '$matriculado', '$observacao')"; 

$result = mysqli_query($connection, $sql);

echo '<script>';
echo 'if ('.($result ? 'true' : 'false').') {';
echo '  alert("Registro gravado no banco com sucesso!");';
echo '} else {';
echo '  alert("Erro ao gravar registro no banco de dados.");';
echo '}';
echo '</script>';

?>
<html>
	<head>
		<title>Cadastro de aluno</title>
	</head>
	<body>
		<div align="center"><h2>Cadastro de Aluno</h2><hr width="50%"><hr width="70%"></div>
			<form method="POST" action="?id=18" onchange="form.submit()">
				<div align="center">
					<br><table border="0">
						<tr>
							<td rowspan="7" align="center" width="315"><hr width="10%"><hr width="30%"><hr width="50%">
								<img src="../uploads/logoNew.png" width="100">
								<hr width="50%">
								<hr width="30%">
								<hr width="10%">
							</td>
						</tr>
						<tr>	
							<td align="right" width="116" >CGM: 
							</td>
							<td>
								<input type="text" size="10" name="textCGM"> Ano:
								<input type="text" size="1" name="textAno"> Turma: 
								<input style="text-align:center" type="text" size="1" name="textTurma">
							</td>
						</tr>
						<tr>
							<td align="right" width="116" >Aluno: 
							</td>
							<td>
								<input type="text" size="50" name="textNome">
							</td>
						</tr>
						<tr>
							<td align="right" width="116" >Nascimento: 
							</td>
							<td>
								<input style="text-align:center" type="text" size="1" name="dataDia">
								<input style="text-align:center" type="text" size="1" name="dataMes">
								<input style="text-align:center" type="text" size="3" name="dataAno"> 
							</td>
						</tr>
						<tr>
							<td align="right" width="116" style="text-align:center">
								<p style="text-align: right">Sexo: 
							</td>
							<td> 
								<input type="text" size="1" name="textSexo" maxlength="1"> Situação da Matricula: 
								<input type="text" size="1" name="textSituacaoMatricula" maxlength="1"> Data da Matricula: 
								<input style="text-align:center" type="text" size="1" name="textDiaMatricula">
								<input style="text-align:center" type="text" size="1" name="textMesMatricula">
								<input style="text-align:center" type="text" size="3" name="textAnoMatricula"> 
							</td>
						</tr>
						<tr>
							<td align="right" width="116" >Observações:</td>
							<td>
								<textarea rows="10" name="textObservacao" cols="50"></textarea>
							</td>
						</tr>
						<tr>
							<td align="center" valign="top" >
								&nbsp;</td>
							<td valign="top">
								<input type="submit" value="Salvar" name="btnSalvar"</center></td>
						</tr>
					</table>
					</div>
		</form>
	</body>
</html>
