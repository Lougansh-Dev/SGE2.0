<?php
include("conexao.php");
include("conf.php");
//include("retornoDados.php");
menu();
//----------------------------------------------------------------------
$sql = "select * from tb_aluno where situacaoMatricula = 'M' order by ano, turma, nome";		
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
    $ocorrencia = $row['ocorrencia'];
    
    if ($situacaoMatricula == 'M'){
        $qtdeAlunos++;
		if($sexo == M){
            $qtdeMeninos++;
        }
		if($sexo == F){
            $qtdeMeninas++;
        }
		if($ano == 0){
            $qtdeAlunosEducacaoInfantil++;
            if($sexo=='M'){
                $meninosEducacaoinfantil++;
            }
            if($sexo=='F'){
                $meninasEducacaoinfantil++;
            }
			if ($turma=='A'){
				$qtdeIA++;
				if($sexo=='M'){
					$meninosIA++;
				}
				if($sexo=='F'){
					$meninasIA++;
				}
			}
			if ($turma=='B'){
				$qtdeIB++;
				if($sexo=='M'){
					$meninosIB++;
				}
				if($sexo=='F'){
					$meninasIB++;
				}
			}
			if ($turma=='C'){
				$qtdeIC++;
				if($sexo=='M'){
					$meninosIC++;
				}
				if($sexo=='F'){
					$meninasIC++;
				}
			}
			if ($turma=='D'){
				$qtdeID++;
				if($sexo=='M'){
					$meninosID++;
				}
				if($sexo=='F'){
					$meninasID++;
				}
			}
			if ($turma=='E'){
				$qtdeIE++;
				if($sexo=='M'){
					$meninosIE++;
				}
				if($sexo=='F'){
					$meninasIE++;
				}
			}
			if ($turma=='F'){
				$qtdeIF++;
				if($sexo=='M'){
					$meninosIF++;
				}
				if($sexo=='F'){
					$meninasIF++;
				}
			}
        }		
		if($ano == 1){
            $qtde1Ano++;
            if($sexo=='M'){
                $meninos1Ano++;
            }
            if($sexo=='F'){
                $meninas1Ano++;
            }
			if ($turma=='A'){
				$qtde1A++;
				if($sexo=='M'){
					$meninos1A++;
				}
				if($sexo=='F'){
					$meninas1A++;
				}
			}
			if ($turma=='B'){
				$qtde1B++;
				if($sexo=='M'){
					$meninos1B++;
				}
				if($sexo=='F'){
					$meninas1B++;
				}
			}
			if ($turma=='C'){
				$qtde1C++;
				if($sexo=='M'){
					$meninos1C++;
				}
				if($sexo=='F'){
					$meninas1C++;
				}
			}
			if ($turma=='D'){
				$qtde1D++;
				if($sexo=='M'){
					$meninos1D++;
				}
				if($sexo=='F'){
					$meninas1D++;
				}
			}
			if ($turma=='E'){
				$qtde1E++;
				if($sexo=='M'){
					$meninos1E++;
				}
				if($sexo=='F'){
					$meninas1E++;
				}
			}
			if ($turma=='F'){
				$qtde1F++;
				if($sexo=='M'){
					$meninos1F++;
				}
				if($sexo=='F'){
					$meninas1F++;
				}
			}
        }
		if($ano == 2){
            $qtde2Ano++;
            if($sexo=='M'){
                $meninos2Ano++;
            }
            if($sexo=='F'){
                $meninas2Ano++;
            }
			if ($turma=='A'){
				$qtde2A++;
				if($sexo=='M'){
					$meninos2A++;
				}
				if($sexo=='F'){
					$meninas2A++;
				}
			}
			if ($turma=='B'){
				$qtde2B++;
				if($sexo=='M'){
					$meninos2B++;
				}
				if($sexo=='F'){
					$meninas2B++;
				}
			}
			if ($turma=='C'){
				$qtde2C++;
				if($sexo=='M'){
					$meninos2C++;
				}
				if($sexo=='F'){
					$meninas2C++;
				}
			}
			if ($turma=='D'){
				$qtde2D++;
				if($sexo=='M'){
					$meninos2D++;
				}
				if($sexo=='F'){
					$meninas2D++;
				}
			}
			if ($turma=='E'){
				$qtde2E++;
				if($sexo=='M'){
					$meninos2E++;
				}
				if($sexo=='F'){
					$meninas2E++;
				}
			}
			if ($turma=='F'){
				$qtde2F++;
				if($sexo=='M'){
					$meninos2F++;
				}
				if($sexo=='F'){
					$meninas2F++;
				}
			}
        }
		if($ano == 3){
            $qtde3Ano++;
            if($sexo=='M'){
                $meninos3Ano++;
            }
            if($sexo=='F'){
                $meninas3Ano++;
            }
			if ($turma=='A'){
				$qtde3A++;
				if($sexo=='M'){
					$meninos3A++;
				}
				if($sexo=='F'){
					$meninas3A++;
				}
			}
			if ($turma=='B'){
				$qtde3B++;
				if($sexo=='M'){
					$meninos3B++;
				}
				if($sexo=='F'){
					$meninas3B++;
				}
			}
			if ($turma=='C'){
				$qtde3C++;
				if($sexo=='M'){
					$meninos3C++;
				}
				if($sexo=='F'){
					$meninas3C++;
				}
			}
			if ($turma=='D'){
				$qtde3D++;
				if($sexo=='M'){
					$meninos3D++;
				}
				if($sexo=='F'){
					$meninas3D++;
				}
			}
			if ($turma=='E'){
				$qtde3E++;
				if($sexo=='M'){
					$meninos3E++;
				}
				if($sexo=='F'){
					$meninas3E++;
				}
			}
			if ($turma=='F'){
				$qtde3F++;
				if($sexo=='M'){
					$meninos3F++;
				}
				if($sexo=='F'){
					$meninas3F++;
				}
			}
        }
		if($ano == 4){
            $qtde4Ano++;
            if($sexo=='M'){
                $meninos4Ano++;
            }
            if($sexo=='F'){
                $meninas4Ano++;
            }
			if ($turma=='A'){
				$qtde4A++;
				if($sexo=='M'){
					$meninos4A++;
				}
				if($sexo=='F'){
					$meninas4A++;
				}
			}
			if ($turma=='B'){
				$qtde4B++;
				if($sexo=='M'){
					$meninos4B++;
				}
				if($sexo=='F'){
					$meninas4B++;
				}
			}
			if ($turma=='C'){
				$qtde4C++;
				if($sexo=='M'){
					$meninos4C++;
				}
				if($sexo=='F'){
					$meninas4C++;
				}
			}
			if ($turma=='D'){
				$qtde4D++;
				if($sexo=='M'){
					$meninos4D++;
				}
				if($sexo=='F'){
					$meninas4D++;
				}
			}
			if ($turma=='E'){
				$qtde4E++;
				if($sexo=='M'){
					$meninos4E++;
				}
				if($sexo=='F'){
					$meninas4E++;
				}
			}
			if ($turma=='F'){
				$qtde4F++;
				if($sexo=='M'){
					$meninos4F++;
				}
				if($sexo=='F'){
					$meninas4F++;
				}
			}
        }
		if($ano == 5){
            $qtde5Ano++;
            if($sexo=='M'){
                $meninos5Ano++;
            }
            if($sexo=='F'){
                $meninas5Ano++;
            }
			if ($turma=='A'){
				$qtde5A++;
				if($sexo=='M'){
					$meninos5A++;
				}
				if($sexo=='F'){
					$meninas5A++;
				}
			}
			if ($turma=='B'){
				$qtde5B++;
				if($sexo=='M'){
					$meninos5B++;
				}
				if($sexo=='F'){
					$meninas5B++;
				}
			}
			if ($turma=='C'){
				$qtde5C++;
				if($sexo=='M'){
					$meninos5C++;
				}
				if($sexo=='F'){
					$meninas5C++;
				}
			}
			if ($turma=='D'){
				$qtde5D++;
				if($sexo=='M'){
					$meninos5D++;
				}
				if($sexo=='F'){
					$meninas5D++;
				}
			}
			if ($turma=='E'){
				$qtde5E++;
				if($sexo=='M'){
					$meninos5E++;
				}
				if($sexo=='F'){
					$meninas5E++;
				}
			}
			if ($turma=='F'){
				$qtde5F++;
				if($sexo=='M'){
					$meninos5F++;
				}
				if($sexo=='F'){
					$meninas5F++;
				}
			}
        }
        if($ano >= 1){
            $qtdeAlunosEnsinoFundamental++;
            if($sexo=='M'){
                $meninosEnsinoFundamental++;
            }
            if($sexo=='F'){
                $meninasEnsinoFundamental++;
            }
        }
    }
}
//----------------------------------------------------------------------
$sqlTurma = "select * from tb_turma where status = 'A' order by ano, turma";		
$resultTurma = mysqli_query($connection, $sqlTurma);
while($rowTurma = mysqli_fetch_array($resultTurma,MYSQLI_ASSOC)) {
    $ID = $rowTurma['ID'];
    $turma = $rowTurma['turma'];
    $ano = $rowTurma['ano'];
    $status = $rowTurma['status'];
    $obs = '<font color="red">'.$rowTurma['obs'].' </font>';
    $texto = $texto.$obs;
    $sqlAluno = "select * from tb_aluno where ano = $ano and turma = '$turma' and situacaoMatricula = 'M' and observacao is not null order by nome";		
    $resultAluno = mysqli_query($connection, $sqlAluno);
        while($rowAluno = mysqli_fetch_array($resultAluno,MYSQLI_ASSOC)) {
        $cgm = $rowAluno['cgm'];
		$ano = $rowAluno['ano'];
		$turma = $rowAluno['turma'];
		$nome = '<font color="blue"><b>'.$rowAluno['nome'].' </b></font>';
		$diaNascimento = date("d", strtotime($rowAluno['nascimento']));
		$mesNascimento = date("m", strtotime($rowAluno['nascimento']));
		$anoNascimento = date("Y", strtotime($rowAluno['nascimento']));
		$sexo = $rowAluno['sexo'];
		$situacao = $rowAluno['situacaoMatricula'];
		$diaMatricula = date("d", strtotime($rowAluno['dataMatricula']));
		$mesMatricula = date("m", strtotime($rowAluno['dataMatricula']));
		$anoMatricula = date("Y", strtotime($rowAluno['dataMatricula']));
        $observacao = '<font color="black">'.$rowAluno['observacao'].' </font>';
        $ocorrencia = $rowAluno['ocorrencia'];
        $texto = $texto.$nome.', '.$observacao;
        $dificuldade = $rowAluno['dificuldade'];

            if($dificuldade == 'S'){
                $listaDificuldade = $listaDificuldade.$ano.$turma.'-'.$nome.'<br>';
                $difCount ++;
            }
            elseif($dificuldade == 'N' && $observacao <> ''){
                $listaDestaque = $listaDestaque.$ano.$turma.'-'.$nome.'<br>';
                $desCount ++;
            }
        }
        //-----------------------------------------------------------
}
echo'
<html>
<head><title>Pré Conselho Informática Educacional</title></head>
<body>
<h1 align="center">Relatório</h1>
<h3 align="center">QUANTIDADE DE ALUNOS ATENDIDOS <BR> INFORMÁTICA EDUCACIONAL</h3>
<div id="editar">
<div align="center">
	<table class="qtdeAlunos" border="1" style="border-collapse: collapse" width="20%" bordercolorlight="#808080" bordercolordark="#000000">
		<tr>
		<table class="turma" border="1">
			<td align="center" width="30%">&nbsp;</td>
			<td align="center" width="20%">ALUNOS</td>
			<td align="center" width="20%">MENINOS</td>
			<td align="center" width="20%">MENINAS</td>
		</tr>
		<tr>
			<td align="center">TOTAL</td>
			<td align="center" width="20%">'.$qtdeAlunos.'</td>
			<td align="center" width="20%">'.$qtdeMeninos.'</td>
			<td align="center" width="20%">'.$qtdeMeninas.'</td>
		</tr>
		<tr>
			<td align="center">&nbsp;</td>
			<td align="center" width="20%">&nbsp;</td>
			<td align="center" width="20%">&nbsp;</td>
			<td align="center" width="20%">&nbsp;</td>
		</tr>
		<tr>
			<td align="center">EDUCAÇÃO INFANTIL</td>
			<td align="center" width="20%">'.$qtdeAlunosEducacaoInfantil.'</td>
			<td align="center" width="20%">'.$meninosEducacaoinfantil.'</td>
			<td align="center" width="20%">'.$meninasEducacaoinfantil.'</td>
		</tr>
		<tr>
			<td align="center">ENSINO FUNDAMENTAL</td>
			<td align="center" width="20%">'.$qtdeAlunosEnsinoFundamental.'</td>
			<td align="center" width="20%">'.$meninosEnsinoFundamental.'</td>
			<td align="center" width="20%">'.$meninasEnsinoFundamental.'</td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td align="center" width="20%">&nbsp;</td>
			<td align="center" width="20%">&nbsp;</td>
			<td align="center" width="20%">&nbsp;</td>
		</tr>
		<tr>
			<td align="center">1º ANO</td>
			<td align="center" width="20%">'.$qtde1Ano.'</td>
			<td align="center" width="20%">'.$meninos1Ano.'</td>
			<td align="center" width="20%">'.$meninas1Ano.'</td>
		</tr>
		<tr>
			<td align="center">2º ANO</td>
			<td align="center" width="20%">'.$qtde2Ano.'</td>
			<td align="center" width="20%">'.$meninos2Ano.'</td>
			<td align="center" width="20%">'.$meninas2Ano.'</td>
		</tr>
		<tr>
			<td align="center">3º ANO</td>
			<td align="center" width="20%">'.$qtde3Ano.'</td>
			<td align="center" width="20%">'.$meninos3Ano.'</td>
			<td align="center" width="20%">'.$meninas3Ano.'</td>
		</tr>
		<tr>
			<td align="center">4º ANO</td>
			<td align="center" width="20%">'.$qtde4Ano.'</td>
			<td align="center" width="20%">'.$meninos4Ano.'</td>
			<td align="center" width="20%">'.$meninas4Ano.'</td>
		</tr>
		<tr>
			<td align="center">5º ANO</td>
			<td align="center" width="20%">'.$qtde5Ano.'</td>
			<td align="center" width="20%">'.$meninos5Ano.'</td>
			<td align="center" width="20%">'.$meninas5Ano.'</td>
		</tr>
	</table>
</div>
<div align="center">
	<h3>DIVISÃO POR TURMAS</h3>
		<table class="turma" border="1">
		<tr>
			<td align="center" width="30%">&nbsp;</td>
			<td align="center" width="20%">ALUNOS</td>
			<td align="center" width="20%">MENINOS</td>
			<td align="center" width="20%">MENINAS</td>
		</tr>
		<tr>
			<td align="center">INFANTIL V A</td>
			<td align="center" width="20%">'.$qtdeIA.'</td>
			<td align="center" width="20%">'.$meninosIA.'</td>
			<td align="center" width="20%">'.$meninasIA.'</td>
		</tr>
		<tr>
			<td align="center">INFANTIL V B</td>
			<td align="center" width="20%">'.$qtdeIB.'</td>
			<td align="center" width="20%">'.$meninosIB.'</td>
			<td align="center" width="20%">'.$meninasIB.'</td>
		</tr>
		<tr>
			<td align="center">INFANTIL V C</td>
			<td align="center" width="20%">'.$qtdeIC.'</td>
			<td align="center" width="20%">'.$meninosIC.'</td>
			<td align="center" width="20%">'.$meninasIC.'</td>
		</tr>
		<tr>
			<td align="center">INFANTIL V D</td>
			<td align="center" width="20%">'.$qtdeID.'</td>
			<td align="center" width="20%">'.$meninosID.'</td>
			<td align="center" width="20%">'.$meninasID.'</td>
		</tr>
		<tr>
			<td align="center">INFANTIL V E</td>
			<td align="center" width="20%">'.$qtdeIA.'</td>
			<td align="center" width="20%">'.$meninosIE.'</td>
			<td align="center" width="20%">'.$meninasIE.'</td>
		</tr>
		<tr>
			<td align="center">INFANTIL V F</td>
			<td align="center" width="20%">'.$qtdeIF.'</td>
			<td align="center" width="20%">'.$meninosIF.'</td>
			<td align="center" width="20%">'.$meninasIF.'</td>
		</tr>
		<tr>
			<td align="center">1º ANO A</td>
			<td align="center" width="20%">'.$qtde1A.'</td>
			<td align="center" width="20%">'.$meninos1A.'</td>
			<td align="center" width="20%">'.$meninas1A.'</td>
		</tr>
		<tr>
			<td align="center">1º ANO B</td>
			<td align="center" width="20%">'.$qtde1B.'</td>
			<td align="center" width="20%">'.$meninos1B.'</td>
			<td align="center" width="20%">'.$meninas1B.'</td>
		</tr>
		<tr>
			<td align="center">1º ANO C</td>
			<td align="center" width="20%">'.$qtde1C.'</td>
			<td align="center" width="20%">'.$meninos1C.'</td>
			<td align="center" width="20%">'.$meninas1C.'</td>
		</tr>
		<tr>
			<td align="center">1º ANO D</td>
			<td align="center" width="20%">'.$qtde1D.'</td>
			<td align="center" width="20%">'.$meninos1D.'</td>
			<td align="center" width="20%">'.$meninas1D.'</td>
		</tr>
		<tr>
			<td align="center">1º ANO E</td>
			<td align="center" width="20%">'.$qtde1E.'</td>
			<td align="center" width="20%">'.$meninos1E.'</td>
			<td align="center" width="20%">'.$meninas1E.'</td>
		</tr>
		<tr>
			<td align="center">1º ANO F</td>
			<td align="center" width="20%">'.$qtde1F.'</td>
			<td align="center" width="20%">'.$meninos1F.'</td>
			<td align="center" width="20%">'.$meninas1F.'</td>
		</tr>
		<tr>
			<td align="center">2º ANO A</td>
			<td align="center" width="20%">'.$qtde2A.'</td>
			<td align="center" width="20%">'.$meninos2A.'</td>
			<td align="center" width="20%">'.$meninas2A.'</td>
		</tr>
		<tr>
			<td align="center">2º ANO B</td>
			<td align="center" width="20%">'.$qtde2B.'</td>
			<td align="center" width="20%">'.$meninos2B.'</td>
			<td align="center" width="20%">'.$meninas2B.'</td>
		</tr>
		<tr>
			<td align="center">2º ANO C</td>
			<td align="center" width="20%">'.$qtde2C.'</td>
			<td align="center" width="20%">'.$meninos2C.'</td>
			<td align="center" width="20%">'.$meninas2C.'</td>
		</tr>
		<tr>
			<td align="center">2º ANO D</td>
			<td align="center" width="20%">'.$qtde2D.'</td>
			<td align="center" width="20%">'.$meninos2D.'</td>
			<td align="center" width="20%">'.$meninas2D.'</td>
		</tr>
		<tr>
			<td align="center">2º ANO E</td>
			<td align="center" width="20%">'.$qtde2E.'</td>
			<td align="center" width="20%">'.$meninos2E.'</td>
			<td align="center" width="20%">'.$meninas2E.'</td>
		</tr>
		<tr>
			<td align="center">2º ANO F</td>
			<td align="center" width="20%">'.$qtde2F.'</td>
			<td align="center" width="20%">'.$meninos2F.'</td>
			<td align="center" width="20%">'.$meninas2F.'</td>
		</tr>
		<tr>
			<td align="center">3º ANO A</td>
			<td align="center" width="20%">'.$qtde3A.'</td>
			<td align="center" width="20%">'.$meninos3A.'</td>
			<td align="center" width="20%">'.$meninas3A.'</td>
		</tr>
		<tr>
			<td align="center">3º ANO B</td>
			<td align="center" width="20%">'.$qtde3B.'</td>
			<td align="center" width="20%">'.$meninos3B.'</td>
			<td align="center" width="20%">'.$meninas3B.'</td>
		</tr>
		<tr>
			<td align="center">3º ANO C</td>
			<td align="center" width="20%">'.$qtde3C.'</td>
			<td align="center" width="20%">'.$meninos3C.'</td>
			<td align="center" width="20%">'.$meninas3C.'</td>
		</tr>
		<tr>
			<td align="center">3º ANO D</td>
			<td align="center" width="20%">'.$qtde3D.'</td>
			<td align="center" width="20%">'.$meninos3D.'</td>
			<td align="center" width="20%">'.$meninas3D.'</td>
		</tr>
		<tr>
			<td align="center">3º ANO E</td>
			<td align="center" width="20%">'.$qtde3E.'</td>
			<td align="center" width="20%">'.$meninos3E.'</td>
			<td align="center" width="20%">'.$meninas3E.'</td>
		</tr>
		<tr>
			<td align="center">3º ANO F</td>
			<td align="center" width="20%">'.$qtde3F.'</td>
			<td align="center" width="20%">'.$meninos3F.'</td>
			<td align="center" width="20%">'.$meninas3F.'</td>
		</tr>
		<tr>
			<td align="center">4º ANO A</td>
			<td align="center" width="20%">'.$qtde4A.'</td>
			<td align="center" width="20%">'.$meninos4A.'</td>
			<td align="center" width="20%">'.$meninas4A.'</td>
		</tr>
		<tr>
			<td align="center">4º ANO B</td>
			<td align="center" width="20%">'.$qtde4B.'</td>
			<td align="center" width="20%">'.$meninos4B.'</td>
			<td align="center" width="20%">'.$meninas4B.'</td>
		</tr>
		<tr>
			<td align="center">4º ANO C</td>
			<td align="center" width="20%">'.$qtde4C.'</td>
			<td align="center" width="20%">'.$meninos4C.'</td>
			<td align="center" width="20%">'.$meninas4C.'</td>
		</tr>
		<tr>
			<td align="center">4º ANO D</td>
			<td align="center" width="20%">'.$qtde4D.'</td>
			<td align="center" width="20%">'.$meninos4D.'</td>
			<td align="center" width="20%">'.$meninas4D.'</td>
		</tr>
		<tr>
			<td align="center">4º ANO E</td>
			<td align="center" width="20%">'.$qtde4E.'</td>
			<td align="center" width="20%">'.$meninos4E.'</td>
			<td align="center" width="20%">'.$meninas4E.'</td>
		</tr>
		<tr>
			<td align="center">4º ANO F</td>
			<td align="center" width="20%">'.$qtde4F.'</td>
			<td align="center" width="20%">'.$meninos4F.'</td>
			<td align="center" width="20%">'.$meninas4F.'</td>
		</tr>
		<tr>
			<td align="center">5º ANO A</td>
			<td align="center" width="20%">'.$qtde5A.'</td>
			<td align="center" width="20%">'.$meninos5A.'</td>
			<td align="center" width="20%">'.$meninas5A.'</td>
		</tr>
		<tr>
			<td align="center">5º ANO B</td>
			<td align="center" width="20%">'.$qtde5B.'</td>
			<td align="center" width="20%">'.$meninos5B.'</td>
			<td align="center" width="20%">'.$meninas5B.'</td>
		</tr>
		<tr>
			<td align="center">5º ANO C</td>
			<td align="center" width="20%">'.$qtde5C.'</td>
			<td align="center" width="20%">'.$meninos5C.'</td>
			<td align="center" width="20%">'.$meninas5C.'</td>
		</tr>
		<tr>
			<td align="center">5º ANO D</td>
			<td align="center" width="20%">'.$qtde5D.'</td>
			<td align="center" width="20%">'.$meninos5D.'</td>
			<td align="center" width="20%">'.$meninas5D.'</td>
		</tr>
		<tr>
			<td align="center">5º ANO E</td>
			<td align="center" width="20%">'.$qtde5E.'</td>
			<td align="center" width="20%">'.$meninos5E.'</td>
			<td align="center" width="20%">'.$meninas5E.'</td>
		</tr>
		<tr>
			<td align="center">5º ANO F</td>
			<td align="center" width="20%">'.$qtde5F.'</td>
			<td align="center" width="20%">'.$meninos5F.'</td>
			<td align="center" width="20%">'.$meninas5F.'</td>
		</tr>
	</table>
</div>
</div>
<div align="center">
	<h3>AVALIAÇÃO</h3>
		<table class="turma" border="1">
		<tr>
			<td align="center" width="50%">DIFICULDADE '.$difCount.'</td>
			<td align="center" width="50%">DESTAQUE '.$desCount.'</td>
		</tr>
		<tr>
			<td align="left" width="50%" valign=top style=" padding-left: 30px; margin-top: 10px">'.$listaDificuldade.'</td>
			<td align="left" width="50%" valign=top style=" padding-left: 30px; margin-top: 10px">'.$listaDestaque.'</td>
		</tr>
        </table>
</div>
</body>
</html>
';
?>
