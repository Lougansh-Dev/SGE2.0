	<?php
	if(isset($_POST['salvar'])){
        $dropCodigo = "zzzzzzzzzz";
        $foto = $_FILES['foto'];
		$ext = strtolower(substr($_FILES['foto']['name'],-4)); //Pegando extensão do arquivo
		$novoNome = $dropCodigo.$ext; //Definindo um novo nome para o arquivo
		$dir = "./img/aluno/";  //Diretório para uploads 
		move_uploaded_file($foto['tmp_name'], $dir.$novoNome); //Fazer upload do arquivo
		chmod("./img/aluno/" . $novoNome, 644); //Corrige a permissão do arquivo.
	}
	echo'
<html>
	<head>
	<title>Upload de imagens</title>
	<meta charset="utf-8">
	</head>

	<body>
		<div class="container">
		<div align="center">
		<form method="post" enctype="multipart/form-data" action="">
		<input name="foto" type="file" accept="image/*">
		<input type="submit" name="salvar" value="Salvar">
		</form>
		<div>	
	</body>
</html>
';
?>
