<?php
session_start();
include './SGE/conexao.php';
include './SGE/conf.php';

$min = 1;
$max = 999;
$altura = 100;
$largura = 99;
$rd = rand($min, $max);

if (isset($_POST['pesquisar']) && $_POST['textPesquisa'] != '') { 
	$pesquisaAluno = $_POST['textPesquisa'];
	$sql = "SELECT * FROM tb_aluno WHERE nome LIKE ?";
	$stmt = mysqli_prepare($connection, $sql);
	$param = "%$pesquisaAluno%";
	mysqli_stmt_bind_param($stmt, "s", $param);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);

	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$cgm = $row['cgm'];
		$explodeNome = explode(" ", $row['nome']);
		$primeiroNome = current($explodeNome);
		$foto_aluno = '../SGE/img/aluno/'.$row['cgm'].'.jpg';
		$mostraFotos .= '<table border="0" style="display:inline;"><tr><td>
		<a href="/SGE/returnAluno.php?cgm='.$cgm.'"><img style="margin: 1px; padding: 1px; border: 1px solid gray" alt="'.$row['nome'].'" title="'.$row['nome'].'" height="100" width="60" src="../SGE/img/aluno/'.$row['cgm'].'.jpg?'.$rd.'"></a></td></tr><tr><td align="center">'.$primeiroNome.'</td></tr><tr><td align="center">'.$ano.$turma.'</td></tr></table>';
	}

	$_SESSION["montaDropCodigo"] = $montaDropCodigo;

	if (isset($_POST['salvar']) && $_POST['dropCodigo'] != '') {
		$id = $_POST['ID'];
		$dropCodigo = $_POST['dropCodigo'];

		if (isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0) {
			$retorno = '<div align=left><strong>'.htmlspecialchars($_FILES["arquivo"]["name"]).'</strong><br>Tipo: <strong>'.htmlspecialchars($_FILES["arquivo"]["type"]).'</strong><br> Temporariamente salvo em: <strong>'.htmlspecialchars($_FILES["arquivo"]["tmp_name"]).'</strong><br> Tamanho: <strong>'.htmlspecialchars($_FILES['arquivo']['size']).'</strong> Bytes<div>';
			$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
			$nome = $_FILES['arquivo']['name'];
			$extensao = strrchr($nome, '.');
			$extensao = strtoupper($extensao);

			$extensoesPermitidas = array('.JPG', '.JPEG');
			if (in_array($extensao, $extensoesPermitidas)) {
				$novoNome = $dropCodigo.$extensao;
				$destino = '../ima/aluno/'.$novoNome; 

				if (@move_uploaded_file($arquivo_tmp, $destino)) {
					echo 'Arquivo salvo com sucesso em: <strong>'.htmlspecialchars($destino).'</strong><br><br>';
					echo '<img src="'.htmlspecialchars($destino).'" width="auto" height="400"><br>'.$retorno;
					echo '<br>Nome modificado para: '.htmlspecialchars($dropCodigo.$extensao);
				} else {
					echo "Permissão negada".htmlspecialchars($destino);
				}
			} else {
				echo "Formato de foto inválido!";
			}
		} else {
			echo "Nenhum arquivo enviado!";
		}
	}
}

echo '
<html>
<head>
	<link rel="stylesheet" href="./main.css">
	<meta charset="utf-8">
	<link rel="icon" href="img/favicon.ico">
	<title>Informatica Educacional</title>
	<style type="text/css">
		img {
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
	<h1 align="center">Escola Francisco Vaz de Lima</h1>
	<h2 align="center">Laboratório de Informática</h2>
	<h5 align="right">Instrutor - Everaldo José de Souza</h5>
	<div align="center">
		<form method="POST" action="?id=18" onchange="form.submit()">
			<h2>Pesquisar Alunos</h2>
			<input type="text" value="" size="10" name="textPesquisa" autofocus>
			<input type="submit" value="Aluno" name="pesquisar">
			<a href="./SGE/mostraFotosTurma.php"><input type="button" value="Turma"></a>
			</form>
		<form method="POST" action="editarAluno.php" onchange="form.submit()">
			<div align="center">'.$mostraFotos.'</div>
		</form>
	</div>
	<div class="link">
		<h1>CONTANDO HISTORIAS</h1>
		
	</div>
	<center><a href="./historias.php"><img src="./SGE/uploads/historia.jpg" width="'.$largura.'"></center> <hr>
	<div class="link">
		<a href="https://geektyper.com/umbrella/">
			<img src="./SGE/uploads/hacker.png" width="'.$largura.'">
		</a>
		<a href="https://carrosnaweb.com.br/compara.asp">
			<img src="./SGE/uploads/carrosnaweb.png" width="'.$largura.'">
		</a>
		<a href="https://poki.com/">
			<img src="./SGE/uploads/poki.jpg" width="'.$largura.'">
		</a>
		<a href="https://poki.com/en/g/subway-surfers">
			<img src="./SGE/uploads/subwaySurf.jpg" width="'.$largura.'">
		</a>
		<a href="https://friv.com/new.html">
			<img src="./SGE/uploads/friv.jpg" width="'.$largura.'">
		</a>
		<a href="https://friv.com/z/games/minecraftclassic/game.html">
			<img src="./SGE/uploads/minecraft.jpg" width="'.$largura.'">
		</a>
		<a href="https://google.com.br/maps/preview">
			<img src="./SGE/uploads/maps.png" width="'.$largura.'">
		</a>
		<a href="https://translate.google.com.br/?hl=pt-BR&sl=pt&tl=en&op=translate">
				<img src="./SGE/uploads/tradutor.jpg" width="'.$largura.'">
		</a>
		<a href="https://lego.com/assets/franchiseSites/Ninjago/primeempire/index.html">
			<img src="./SGE/uploads/ninja.png" width="'.$largura.'">
		</a>
		<a href="https://forms.gle/f66NVrTyrQEsAdTc8">
			<img src="./SGE/uploads/quizizz.jpg" width="'.$largura.'">
		</a>
		<a href="https://www.noas.com.br/ensino-fundamental-1/matematica/torre-de-hanoi/">
			<img src="./SGE/uploads/hanoi.png" width="'.$largura.'">
		</a>
		<a href="https://forms.gle/Rtjg12GvToXDzxM38">
			<img src="./SGE/uploads/entrevista.png" width="'.$largura.'">
		</a>
	</div>
</body>
</html>
';
?>

