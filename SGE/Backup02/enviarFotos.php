	<?php
	session_start();
	include './conexao.php';
	include './conf.php';
	menu();
	if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
		$ano = substr($_POST['Lista'],0,1);
		$turma = substr($_POST['Lista'],1,1);
		$sql = "select * from tb_aluno where ano = '$ano' and turma = '$turma' and situacaoMatricula = 'M' order by nome asc";		
		$result = mysqli_query($connection, $sql);
    	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$foto_aluno = './img/aluno/'.$row['cgm'].'.jpg';
			$montaDropCodigo = $montaDropCodigo.'<option value="'.$row['cgm'].'">'.$row['nome'].'</option>';
		}
		$_SESSION["montaDropCodigo"] = $montaDropCodigo;
	}
	if(isset($_POST['salvar']) and $_POST['dropCodigo'] != ''){
		$dropCodigo = $_POST['dropCodigo'];
        $foto = $_FILES['foto'];
		$ext = strtolower(substr($_FILES['foto']['name'],-4)); //Pegando extensão do arquivo
		$novoNome = $dropCodigo.$ext; //Definindo um novo nome para o arquivo
		
        $dir = "./img/aluno/";  //Diretório para uploads 
		move_uploaded_file($foto['tmp_name'],  $dir.$novoNome); //Fazer upload do arquivo

		chmod("./img/aluno/" . $novoNome, 0755); //Corrige a permissão do arquivo.
		$retorno ='<div class="alert alert-success" role="alert" align="center">
          <img src="./img/aluno/' . $novoNome . '" class="img img-responsive img-thumbnail" width="200"> 
          <br>
          Imagem '.$novoNome.' enviada com sucesso!
          <br>
          <a href="exemplo_upload_de_imagens.php">';
	}
	echo'
<html>
	<head>
	<title>Upload de imagens</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	</head>

	<body>
		<div class="container">
		<div align="center">
		<form method="post" enctype="multipart/form-data" action="?foto">
		<h2 align="center">SISTEMA DE INCLUSÃO E ALTERAÇÃO DE FOTO</h2>
		<h3>'.$titulo.'</h3><br></font></b> '.$mostraMenu.'
		<hr width="50%" color="#0000FF">
		<hr width="30%" color="#FF0000">
		'.$ano.$turma.'
		<select size="1" name="dropCodigo">'.$_SESSION["montaDropCodigo"].'</select>
		<input name="foto" type="file" accept="image/*">
		<input type="submit" name="salvar" value="Salvar">
		<hr width="30%" color="#FF0000">
		<hr width="50%" color="#0000FF">
		</form>
		'.$retorno.'
		<div>	
	</body>
</html>
';
?>
