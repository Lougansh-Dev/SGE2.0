﻿<?php 
session_start("editar");
include './conexao.php';
include './conf.php';
menu();
//----------------------------------------------------------------------------------------------------------------------------------
if (isset($_POST['btnApagar'])){
$cgm = $_POST['textCGM'];
$foto_aluno = './img/aluno/'.$cgm.'.jpg';

$arquivo = $foto_aluno;
$resultado = unlink($arquivo);
var_dump( $resultado );
    if($resultado){
    echo'
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
			alert ("Removido '.$arquivo.' com sucesso!!!")
			window.location="listar.php"	
		</SCRIPT>
	';}
}
if (isset($_POST['btnSalvar']) && $_POST['textCGM'] != ''){
		$cgm = $_POST['textCGM'];
        $ano = $_POST['textAno'];
        $turma = $_POST['textTurma'];
        $nome = $_POST['textNome'];
		$nascimento = $_POST['textAnoNascimento'].'-'.$_POST['textMesNascimento'].'-'.$_POST['textDiaNascimento'];
		$sexo = $_POST['textSexo'];
		$situacao = $_POST['textSituacaoMatricula'];
		$matriculado = $_POST['textAnoMatricula'].'-'.$_POST['textMesMatricula'].'-'.$_POST['textDiaMatricula'];
		$observacao = $_POST['textObservacao'];
		$dificuldade = $_POST['dificuldade'];
		$programacao = $_POST['programacao'];
		$leitura = $_POST['leitura'];
echo $observacao;
$sql = "update tb_aluno set ano='$ano',turma='$turma', nome='$nome',nascimento='$nascimento',sexo='$sexo',situacaoMatricula='$situacao',dataMatricula='$matriculado',
observacao='$observacao',dificuldade='$dificuldade',programacao='$programacao',leitura='$leitura' where cgm = '$cgm'"; 
$result = mysqli_query($connection, $sql);
    if($result){
    echo'
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
			alert ("Atualizado com sucesso!!!")
			window.location="listar.php"	
		</SCRIPT>
	';}
}
//----------------------------------------------------------------------------------------------------------------------------------
if($_SERVER['REQUEST_METHOD']=='GET') {
	if(isset($_GET['cgm'])){
		$aluno = $_GET['cgm'];		
		$sql = "SELECT a.cgm, a.ano, a.turma, a.nome, a.nascimento, a.sexo, a.situacaoMatricula, a.dataMatricula, a.observacao, a.dificuldade, a.programacao, a.leitura, t.turno
        FROM tb_aluno a
        INNER JOIN tb_turma t ON a.turma = t.turma AND a.ano = t.ano
        WHERE a.cgm = $aluno";
		$result = mysqli_query($connection, $sql);
   	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$i++;
      	$cgm = $row['cgm'];
      	$ano = $row['ano'];
      	$turma = $row['turma'];
        $turno = $row['turno'];
		$nome = $row['nome'];
		$diaNascimento = date("d", strtotime($row['nascimento']));
		$mesNascimento = date("m", strtotime($row['nascimento']));
		$anoNascimento = date("Y", strtotime($row['nascimento']));
		$sexo = $row['sexo'];
		$situacao = $row['situacaoMatricula'];
		$diaMatricula = date("d", strtotime($row['dataMatricula']));
		$mesMatricula = date("m", strtotime($row['dataMatricula']));
		$anoMatricula = date("Y", strtotime($row['dataMatricula']));
		$observacao = $row['observacao'];
		$dificuldade = $row['dificuldade'];
		$programacao = $row['programacao'];
		$leitura = $row['leitura'];
		if ($leitura == "O") {
			$radioLeitura = '
			<input type="radio" value="O" name="leitura" checked >Otimo
			<input type="radio" value="B" name="leitura" >Bom
			<input type="radio" value="R" name="leitura" >Ruim
			<input type="radio" value="N" name="leitura" >Não sabe ler
			';
		} elseif ($leitura == "B") {
			$radioLeitura = '
			<input type="radio" value="O" name="leitura" >Otimo
			<input type="radio" value="B" name="leitura" checked >Bom
			<input type="radio" value="R" name="leitura" >Ruim
			<input type="radio" value="N" name="leitura" >Não sabe ler
			';
		} elseif ($leitura == "R") {
			$radioLeitura = '
			<input type="radio" value="O" name="leitura" >Otimo
			<input type="radio" value="B" name="leitura" >Bom
			<input type="radio" value="R" name="leitura" checked >Ruim
			<input type="radio" value="N" name="leitura" >Não sabe ler
			';
		} elseif ($leitura == "N") {
			$radioLeitura = '
			<input type="radio" value="O" name="leitura" >Otimo
			<input type="radio" value="B" name="leitura" >Bom
			<input type="radio" value="R" name="leitura" >Ruim
			<input type="radio" value="N" name="leitura" checked >Não sabe ler
			';
		} else {
			$radioLeitura = '
			<input type="radio" value="O" name="leitura" >Otimo
			<input type="radio" value="B" name="leitura" >Bom
			<input type="radio" value="R" name="leitura" >Ruim
			<input type="radio" value="N" name="leitura" >Não sabe ler';
		}

		$date = new DateTime( $row['nascimento'] );
		$interval = $date->diff( new DateTime( date() ) );
		$foto_aluno = './img/aluno/'.$row['cgm'].'.jpg';
		if (!file_exists($foto_aluno)) {
			$foto_aluno = './uploads/aluno.jpg';
		}
		}
	}
echo
	'<html>
	<head>
	<title>Editar Alunos</title>
    <style type="text/css">
            img{
                border-radius: 10px;
                padding: 5px 5px 5px 5px;
            }
            div.link {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100px;
            }
            a:link {
                text-decoration: none;
            }
        </style>
	</head>
	<body>
		<div align="center"><h2>Cadastro de Aluno</h2><hr width="50%"><hr width="70%"></div>
			<form method="POST" action="?id=18" onchange="form.submit()">
				<div align="center">
					<br>
					<table border="0">
						<tr>
							<td rowspan="8" align="center" width="315"><hr width="10%"><hr width="30%"><hr width="50%">
							<img style="margin: 1px; padding: 1px; border: 1px solid gray" width="200" alt="'.$row['nome'].'" title="'.$row['nome'].'" src="'.$foto_aluno.'?'.$rd.'"><br>
                                <input align="center" type="submit" value="Apagar" name="btnApagar"><br>
							<input align="center" name="foto" type="file" accept="image/*"><input type="submit" value="Alterar" name="btnAlterarFoto">
								<hr width="50%">
								<hr width="30%">
								<hr width="10%">
							</td>
						</tr>
						<tr>	
							<td align="right" width="116" >CGM: 
							</td>
							<td>
								<input style="text-align:center" type="text" size="10" name="textCGM" value="'.$cgm.'"> Ano:
								<input style="text-align:center" type="text" size="1" name="textAno" value="'.$ano.'"> Turma: 
								<input style="text-align:center" type="text" size="1" name="textTurma" value="'.$turma.'"> Turno: 
                                <input style="text-align:center" type="text" size="1" name="textTurno" value="'.$turno.'">
							</td>
						</tr>
						<tr>
							<td align="right" width="116" >Aluno: 
							</td>
							<td>
								<input type="text" size="50" name="textNome" value="'.$nome.'">
							</td>
						</tr>
						<tr>
							<td align="right" width="116" >Nascimento: 
							</td>
							<td>
								<input style="text-align:center" type="text" size="1" name="textDiaNascimento" value="'.$diaNascimento.'">
								<input style="text-align:center" type="text" size="1" name="textMesNascimento" value="'.$mesNascimento.'">
								<input style="text-align:center" type="text" size="3" name="textAnoNascimento" value="'.$anoNascimento.'"> 
                                <input style="text-align:center" type="text" size="5" name="Idade" value="' .$interval->format( '%Y Anos' ). '">
                                								
                                Dificuldade 
								<input style="text-align:center" type="text" size="1" name="dificuldade" value="'.$dificuldade.'">
								Programação 
								<input style="text-align:center" type="text" size="1" name="programacao" value="'.$programacao.'">
								
                                
							</td>
						</tr>
						<tr>
							<td align="right" width="116" style="text-align:center">
								<p style="text-align: right">Leitura:
							</td>
							<td> 
								'.$radioLeitura.'
							</td>
						</tr>
						<tr>
							<td align="right" width="116" style="text-align:center">
								<p style="text-align: right">Sexo: 
							</td>
							<td> 
								<input style="text-align:center" type="text" size="1" name="textSexo" maxlength="1" value="'.$sexo.'"> Situação da Matricula: 
								<input style="text-align:center" type="text" size="1" name="textSituacaoMatricula" maxlength="1" value="'.$situacao.'"> Data da Matricula: 
								<input style="text-align:center" type="text" size="1" name="textDiaMatricula" value="'.$diaMatricula.'">
								<input style="text-align:center" type="text" size="1" name="textMesMatricula" value="'.$mesMatricula.'">
								<input style="text-align:center" type="text" size="3" name="textAnoMatricula" value="'.$anoMatricula.'"> 
							</td>
						</tr>
						<tr>
							<td align="right" width="116" >Observações:</td>
							<td>
								<textarea rows="10" name="textObservacao" cols="50">'.$observacao.'</textarea>
							</td>
						</tr>
						<tr>
							<td align="right" width="116" >&nbsp;</td>
							<td>
								<p align="center">
								<input type="submit" value="Salvar" name="btnSalvar"></td>
						</tr>
						</table>

                        <ul align="left">
							<li>Apresentou grande autonomia, boa assimilação e fixação de conteúdo, realizando todas as atividades de maneira satisfatória. Destacou-se entre seus colegas de forma responsável, independente, participativa, apresentou bom comportamento e grande potencial.</li>
                            <li>O aluno não adquiriu os conceitos, está em fase de aprendizado.Aprendeu algumas noções, mas necessita desenvolver o raciocínio logico, coordenação motora e uso das ferramentas tecnológicas.</li>


							<li>Apresentou dificuldades de auto-regulação, pois quer atenção o tempo todo, não respeitando a individualidade dos colegas. Demonstrou gressividade em situações de conflito; usa meios físicos para alcançar o que deseja. Costuma não aceitar e compreender as solicitações dos adultos; Tem dificuldades em cumprir regras.</li>

							<li>Costuma falar mais que o necessário, não respeitando os momentos em que o grupo necessita de silêncio, quando chamado sua atenção ignora completamente, sendo necessário faze-lo por varias vezes seguidas até conseguir que a mesma siga as instruções e regras do laboratório. </li>

                            <li>Destacoum-se entre seus colegas nas atividades, concluindo e obtendo ótimo aproveitamento nas mesmas.</li>
					<h2 align="center">Dicas para Relatorios</h2>
                        </ul>
						<ul align="left">
						<b>Com base nos objetivos trabalhado no bimestre:</b>

							<li><b>O aluno não sabe</b> O aluno não adquiriu os conceitos, está em fase de aprendizado.</li>
							<li><b>Não tem limites</b> Apresenta dificuldades de auto-regulação, pois...</li>
							<li><b>É nervoso</b> Ainda não desenvolveu habilidades para convívio no ambiente escolar, pois...</li>
							<li><b>Tem o costume de roubar</b> Apresenta dificuldade de autocontrole, pois...</li>
							<li><b>É agressivo</b> Demonstra agressividade em situações de conflito. Usa meios físicos para alcançar o que deseja</li>
							<li><b>É bagunceiro, relaxado, porco</b> Ainda não desenvolveu hábitos próprios de higiene e de cuidado com seus pertences.</li>
							<li><b>Não sabe nada</b> Aprendeu algumas noções, mas necessita desenvolver...</li>
							<li><b>É largado da família</b> Aparenta ser desassistido pela família, pois...</li>
							<li><b>É desobediente</b> Costuma não aceitar e compreender as solicitações dos adultos, Tem dificuldades em cumprir regras.</li>
							<li><b>É apático, distraído</b> Ainda não demonstra interesse em participar das atividades propostas, Muitas vezes parece se desligar da realidade, envolvido em seus pensamentos.</li>
							<li><b>É mentiroso</b> Costuma utilizar inverdades para justificar seus atos ou relatar as atitudes dos colegas</li>
							<li><b>É fofoqueiro</b> Costuma se preocupar com os hábitos e atitudes dos colegas.</li>
							<li><b>É chiclete</b> É muito afetuoso, demonstra constantemente seu carinho...</li>
							<li><b>É sonso e dissimulado</b> Em situações de conflito coloca-se como expectador, mesmo quando está clara a sua participação.</li>
							<li><b>É preguiçoso</b> Não realiza as tarefas, aparentando desânimo e cansaço. Porém logo parte para as brincadeiras e outras atividades.</li>
							<li><b>É mimado</b> Aparenta desejar atenções diferenciadas para si, solicitando que sejam feitas todas as suas vontades.</li>
							<li><b>É deprimido, isolado, anti-social</b> Evita o contato e o diágolo com colegas e professores preferindo permanecer sozinho, Ainda não desenvolveu hábitos e atitudes próprias do convívio social.</li>
							<li><b>É tagarela</b> Costuma falar mais que o necessário, não respeitando os momentos em que o grupo necessita de silêncio.</li>
							<li><b>Tem a boca suja</b> Utiliza-se de palavras pouco cordiais para repelir ou afrontar.</li>
							<li><b>Possui distúrbio de comportamento</b> Apresenta comportamento fora do comum para sua idade e para o convívio em grupo, tais como...</li>
							<li><b>É egoísta</b> Ainda não sabe dividir o espaço e os materiais de forma coletiva</li>
						</ul>
					</div>
				</div>
		</form>
	</body>
</html>
';
}
?>
