﻿	<?php
	session_start("historico");
	include './conexao.php';
	include './conf.php';
	$min = 1;
	$max = 999;
	$rd = rand($min, $max);
	menu();
	if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
		$ano = substr($_POST['Lista'],0,1);
		$turma = substr($_POST['Lista'],1,1);
        if($ano=='A' && $turma =='D') {
	    $sql = "select * from tb_aluno where situacaoMatricula = 'M' and dificuldade = 'S' order by ano, turma, nome asc";
        }
        elseif($ano=='C' && $turma =='P') {
	    $sql = "select * from tb_aluno where situacaoMatricula = 'M' and programacao = 'S' order by ano, turma, nome asc";
        }
        else{
		$sql = "select * from tb_aluno where ano = '$ano' and turma = '$turma' and situacaoMatricula = 'M' order by nome desc";
        }
        
		$result = mysqli_query($connection, $sql);
    	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$cgm = $row['cgm'];
    		$explodeNome = explode(" ",$row['nome']);
			$primeiroNome = current($explodeNome);
			$foto_aluno = './img/aluno/'.$row['cgm'].'.jpg';
            if (!file_exists($foto_aluno)) {
                $foto_aluno = './uploads/aluno.jpg';
            }
			$mostraFotos = '<table border="0" style="display:inline;"><tr><td>
			<a href="editarDireto.php?cgm='.$cgm.'"><img style="margin: 1px; padding: 1px; border: 1px solid gray" alt="'.$row['nome'].'" title="'.$row['nome'].'" src="'.$foto_aluno.'?'.$rd.'"></a></td></tr><tr><td align="center">'.$primeiroNome.'</td></tr><tr><td align="center">'.$ano.$turma.'</td></tr></table>'.$mostraFotos;
		}
		$_SESSION["montaDropCodigo"] = $montaDropCodigo;
	}
	if(isset($_POST['salvar']) and $_POST['dropCodigo'] != ''){
		$id = $_POST['ID'];
		$dropCodigo = $_POST['dropCodigo'];
		if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0){
		$retorno = '<div align=left><strong>'.$_FILES["arquivo"]["name"].'</strong><br>Tipo: <strong>'.$_FILES["arquivo"]["type"].'</strong><br> Temporariamente salvo em: <strong>'.$_FILES["arquivo"]["tmp_name"].'</strong><br> Tamanho: <strong>'.$_FILES['arquivo']['size'].'</strong> Bytes<div>';
		$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
		$nome = $_FILES['arquivo']['name'];
		$extensao = strrchr($nome, '.');
		$extensao = strtoupper($extensao);
		if(strstr('.jpg;.jpg;', $extensao)){
		$novoNome = $dropCodigo.$extensao;

		$destino = './img/aluno/' . $novoNome; 
		if( @move_uploaded_file( $arquivo_tmp, $destino  )){
		echo 'Arquivo salvo com sucesso em : <strong>'.$destino.'</strong><br><br>';
		echo '<img src="'.$destino.'" width="auto" height="400"><br>'.$retorno;
		echo '<br>Nome modificado para: '.$dropCodigo.$extensao;
		} else{echo "Permissão negada".$destino;}
		} else {echo "Formato de foto invalido!!!";}
		} else {echo "Nenhum arquivo enviado!!!";}
	}
echo'
	<html>
		<head>
			<link rel="stylesheet" href="./main.css">
			<meta charset="utf-8">
			<link rel="icon" href="img/favicon.ico">
			<title> Fotos </title>
		</head>
		<body>
			<div align="center">
			<form method="post" action="?foto">
			<h2 align="center">'.$escola.'</h2>
			'.$mostraMenu.'
			<hr width="50%" color="#0000FF">
			<hr width="30%" color="#FF0000">
			<div id="ident">
			'.$mostraFotos.'
			</div>
			<hr width="30%" color="#FF0000">
			<hr width="50%" color="#0000FF">
		</form>
		</body>
	</html>
';
?>
