<?php
session_start();
include("conexao.php");
include("conf.php");
menu();
if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
$ano = substr($_POST['Lista'],0,1);
$turma = substr($_POST['Lista'],1,1);
    if ($ano >=0 && $turma != 'U'){
    $titulo = $ano.'º Ano '.$turma;
    if($ano=='L') {
    $sql = "select * from tb_aluno where situacaoMatricula = 'M' and ano >= 3 order by ano, turma, nome asc";
    }else{
        $sql = "select * from tb_aluno where ano = '$ano' and turma = '$turma' and situacaoMatricula = 'M' and leitura = '' order by nome asc";
    }
    $result = mysqli_query($connection, $sql);
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $i++;
            $montaLista  = $montaLista.'
            <input type="checkbox" name= "cgm[]" value="'.$row['cgm'].'">'. $row['nome'] .'<br>';
        }
        $turmaQTDE = $titulo.' - '.$i.' alunos';
        $formulario =  $montaLista.'
        <center>
		<input type="radio" value="O" name="leitura" onchange="form.submit()">Otimo
		<input type="radio" value="B" name="leitura" onchange="form.submit()">Bom
		<input type="radio" value="R" name="leitura" onchange="form.submit()">Ruim
		<input type="radio" value="N" name="leitura" onchange="form.submit()">Não sabe ler
		</center>';
        $_SESSION["formulario"] = $formulario;
        $_SESSION["anoTurma"] = $ano.'º'.$turma;
        $_SESSION["turmaQTDE"] = $turmaQTDE;
    }
}	
if (isset($_POST['leitura'])) {
    $leitura = $_POST['leitura'];
    
    foreach($_POST['cgm'] AS $key => $value){
    $sqlUpdate = "update tb_aluno set leitura = '$leitura' where cgm = $value";
    $resultUpdate = mysqli_query($connection, $sqlUpdate);
    }
    echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Leitura atualizada com sucesso")</SCRIPT>';
    echo "<script>window.setTimeout(\"location.href=aproveitamento.php'\",1)</script>";
    }
	echo '
	<html>
		<head><title> Lista de alunos '.$_SESSION["anoTurma"].'</title></head>
		<body>	
			<form method="POST" action="?id=aproveitamento" onchange="form.submit()">
				<div align="center"><h2>Leitura dos Alunos'.$mostraCaixaSuspensa2.'</h2>'.$_SESSION["turmaQTDE"].'
                <hr width="50%">
                '.$hoje.'
                <hr width="70%"></div>
				<div align="left">
				'.$_SESSION["formulario"].'
				</div>
			</form>
		</body>
	</html>
	';
?>
