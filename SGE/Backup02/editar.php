<?php
session_start("editar");
		<tr>
			<td align="center">'.$cgm.'</td>
			<td>'.$nome.'</td>
			<td align="center"><a href="editarDireto.php?cgm='.$cgm.'">Editar</a></td>
			<td align="center"><a href="personalidade.php?cgm='.$cgm.'">Observação</a></td>
			<td align="center"><a href="Direto.php?id='.$cgm.'" target="_blank" rel="noopener noreferrer">Imprimir</a></td>
		</tr>
		';
		$_SESSION["alunos"] = $lista;
				<table border="1">
				<tr>
					<td align="center">CGM</td>
					<td align="center">Nome</td>
					<td align="center">Editar</td>
					<td align="center">Observação</td>
					<td align="center">Imprimir</td>
				</tr>
				'.$_SESSION["alunos"].'
				</table>
				</div>