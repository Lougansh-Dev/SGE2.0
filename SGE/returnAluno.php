<?php 
include './conexao.php';
include './conf.php';

function signo($d, $m) {
    if ($m == "3"  AND $d >= "20") { $signo = "Aries";       }   //Áries       20/03 a 20/04
elseif ($m == "4"  AND $d <= "20") { $signo = "Aries";       }   //Áries       20/03 a 20/04
elseif ($m == "4"  AND $d >= "21") { $signo = "Touro";       }   //Touro       21/04 a 20/05
elseif ($m == "5"  AND $d <= "20") { $signo = "Touro";       }   //Touro       21/04 a 20/05
elseif ($m == "5"  AND $d >= "21") { $signo = "Gemeos";      }   //Gêmeos      21/05 a 20/06
elseif ($m == "6"  AND $d <= "20") { $signo = "Gemeos";      }   //Gêmeos      21/05 a 20/06
elseif ($m == "6"  AND $d >= "21") { $signo = "Cancer";      }   //Câncer      21/06 a 21/07
elseif ($m == "7"  AND $d <= "21") { $signo = "Cancer";      }   //Câncer      21/06 a 21/07
elseif ($m == "7"  AND $d >= "22") { $signo = "Leao";        }   //Leão        22/07 a 22/08
elseif ($m == "8"  AND $d <= "22") { $signo = "Leao";        }   //Leão        22/07 a 22/08
elseif ($m == "8"  AND $d >= "23") { $signo = "Virgem";      }   //Virgem      23/08 a 22/09
elseif ($m == "9"  AND $d <= "22") { $signo = "Virgem";      }   //Virgem      23/08 a 22/09
elseif ($m == "9"  AND $d >= "23") { $signo = "Libra";       }   //Libra       23/09 a 22/10
elseif ($m == "10" AND $d <= "22") { $signo = "Libra";       }   //Libra       23/09 a 22/10
elseif ($m == "10" AND $d >= "23") { $signo = "Escorpiao";   }   //Escorpião   23/10 a 21/11
elseif ($m == "11" AND $d <= "21") { $signo = "Escorpiao";   }   //Escorpião   23/10 a 21/11
elseif ($m == "11" AND $d >= "22") { $signo = "Sagitario";   }   //Sagitário   22/11 a 21/12
elseif ($m == "12" AND $d <= "21") { $signo = "Sagitario";   }   //Sagitário   22/11 a 21/12
elseif ($m == "12" AND $d >= "22") { $signo = "Capricornio"; }   //Capricórnio 22/12 a 21/01
elseif ($m == "1"  AND $d <= "21") { $signo = "Capricornio"; }   //Capricórnio 22/12 a 21/01
elseif ($m == "1"  AND $d >= "21") { $signo = "Aquario";     }   //Aquário     21/01 a 18/02
elseif ($m == "2"  AND $d <= "18") { $signo = "Aquario";     }   //Aquário     21/01 a 18/02    
elseif ($m == "2"  AND $d >= "19") { $signo = "Peixes";      }   //Peixes      19/02 a 19/03
elseif ($m == "3"  AND $d <= "19") { $signo = "Peixes";      }   //Peixes      19/02 a 19/03
else { $signo = "Não Reconhecido"; }
return $signo;
}
if($_SERVER['REQUEST_METHOD']=='GET') {
	if(isset($_GET['cgm'])){
		$aluno = $_GET['cgm'];		
		$sql = "select * from tb_aluno where cgm = $aluno";
		$result = mysqli_query($connection, $sql);
   	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$i++;
      	    $cgm = $row['cgm'];
      	    $ano = $row['ano'];
      	    $turma = $row['turma'];
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
				if($mesNascimento==1){$mesExtenso = 'janeiro';}
				if($mesNascimento==2){$mesExtenso = 'fevereiro';}
				if($mesNascimento==3){$mesExtenso = 'março';}
				if($mesNascimento==4){$mesExtenso = 'abril';}
				if($mesNascimento==5){$mesExtenso = 'maio';}
				if($mesNascimento==6){$mesExtenso = 'junho';}
				if($mesNascimento==7){$mesExtenso = 'julho';}
				if($mesNascimento==8){$mesExtenso = 'agosto';}
				if($mesNascimento==9){$mesExtenso = 'setembro';}
				if($mesNascimento==10){$mesExtenso = 'outubro';}
				if($mesNascimento==11){$mesExtenso = 'novembro';}
				if($mesNascimento==12){$mesExtenso = 'dezembro';}
			$ano = date('Y', strtotime($row['nascimento']));
			$diaTrabalho = date('d', strtotime($row['dataTrabalho']));
			$mesTrabalho = date('m', strtotime($row['dataTrabalho']));
			$anoTrabalho = date('Y', strtotime($row['dataTrabalho']));
			$date = new DateTime( $row['nascimento'] );
			$interval = $date->diff( new DateTime( date() ) );	
			$signo = strtolower(signo($diaNascimento,$mesNascimento));
			$mostraFotos = '<hr><img style="margin: 0px; padding: 0px" src="./img/aluno/'.$row['cgm'].'.jpg" height="300" 
title="'.$row['ano'].$row['turma'].' - '.$row['nome'].'"></a>'.$mostraFotos;
		}
		if ($signo == 'aries'){
            if ($sexo == 'M'){
			$retSigno = 'Aventureiro e intenso. Assertivo, confiante e ousado, é capaz de, com jeitinho, conquistar tudo    aquilo que deseja. Com um excelente senso de humor. Dotado de muita energia e dinamismo, competitivo, autêntico, empreendedor e uma ótima líder. Ambiciosa e persistente na conquista de seus objetivos. Onde ela esta, o ambiente nunca será monótono. Decidido e de opinião forte, dificilmente se dobra à vontade dos outros.'; 
            }
            if ($sexo == 'F'){
			$retSigno = 'Aventureira e intensa. Assertiva, confiante e ousada, é capaz de, com jeitinho, conquistar tudo    aquilo que deseja. Charmosa com um excelente senso de humor. Dotada de muita energia e dinamismo, competitiva, autêntica, empreendedora e uma ótima líder. Ambiciosa e persistente na conquista de seus objetivos. Onde ela esta, o ambiente nunca será monótono. Decidida e de opinião forte, dificilmente se dobra à vontade dos outros.';
            }

		}
		if ($signo == 'touro'){
            if ($sexo == 'M'){
			$retSigno = 'Perseverante, paciente e pé no chão, é a pessoa que  todo mundo vai querer ter por perto. Confiante e confiável, é prático, planejador, determinado e tem muito senso comum. Costuma ser decidido e de opinião forte e esta sempre na busca por constantes conquistas. Desperta admiração por onde passa e, enquanto todos desistem de algo no primeiro obstáculo, ele não perde a esperança. Gosta de estabilidade, tranquilidade, paz e de rotina. Sempre prevenido, preza pela estabilidade, segurança e conforto.';
		    }
            if ($sexo == 'F'){
            $retSigno = 'Perseverante, paciente e pé no chão, é a pessoa que  todo mundo vai querer ter por perto. Confiante e confiável, é prática, planejadora, determinada e tem muito senso comum. Costuma ser decidida e de opinião forte e esta sempre na busca por constantes conquistas. Desperta admiração por onde passa e, enquanto todos desistem de algo no primeiro obstáculo, ela não perde a esperança. Gosta de estabilidade, tranquilidade, paz e de rotina. Sempre prevenida, preza pela estabilidade, segurança e conforto.';
            }
			
		}
		if ($signo == 'gemeos'){
            if ($sexo == 'M'){
			$retSigno = 'Faz amigos rapidamente, muito espirituoso, animado e sempre deixa sua marca nas pessoas. Com um sorriso cativante, é divertido,  animado, curioso, amante da diversão e muito, muito comunicativo. Adora  uma festa, esta sempre rodeada de amigos e possui grande poder de persuasão. Adora estar sempre elegante.';
            }
            if ($sexo == 'F'){
			$retSigno = 'Faz amigos rapidamente, muito espirituosa, animada e sempre deixa sua marca nas pessoas. Com um sorriso cativante, é divertida,  animada, curiosa, amante da diversão e muito, muito comunicativa. Adora  uma festa, esta sempre rodeada de amigos e possui grande poder de persuasão. Adora estar sempre elegante.';
            }
		}
		if ($signo == 'cancer'){
            if ($sexo == 'M'){
			$retSigno = 'Protege os amigos acima de qualquer coisa, sabe dar valor a quem esta ao seu lado. Seguro, emotivo, carinhoso, sensível, tímido e simpático, doce, coloca a família acima de tudo.';
            }
             if ($sexo == 'F'){
			$retSigno = 'Protege os amigos acima de qualquer coisa, sabe dar valor a quem esta ao seu lado. Segura, emotiva, carinhosa, sensível, tímida e simpática, doce, coloca a família acima de tudo.';
            }
		}
		if ($signo == 'leao'){
            if ($sexo == 'M'){
			$retSigno = 'De espírito acolhedor, atrai as pessoas a sua volta, e sua leveza de espirito levanta o ânimo de todo mundo. É afetivo, entusiasto, criativo, leal, generoso e extrovertido, além de um líder nato. Forte, livre e extravagante. Responsável por um magnetismo de dar inveja, sempre alegre, otimista, preza pela independência e pela sinceridade sempre.';
            }
             if ($sexo == 'F'){
			$retSigno = 'De espírito acolhedor, atrai as pessoas a sua volta, e sua leveza de espirito levanta o ânimo de todo mundo. É afetiva, entusiasta, criativa, leal, generosa e extrovertida, além de uma líder nata. Forte, livre e extravagante. Responsável por um magnetismo de dar inveja, sempre alegre, otimista, preza pela independência e pela sinceridade sempre.';
            }
		}
		if ($signo == 'virgem'){
            if ($sexo == 'M'){
			$retSigno = 'Calmo e sereno. Com uma inteligência acima da media, possui uma enorme facilidade em analisar com precisão a personalidade de seus amigos. Guerreiro, modesto, confiável, cauteloso, paciente, metódico e eficiente, cuida harmoniosamente cada detalhe, ao mesmo tempo é muito prático. Perfeccionista, quer tudo bem organizado e limpo. Muito discreto, amigável e divertido.';
            }
             if ($sexo == 'F'){
			$retSigno = 'Calma e serena. Com uma inteligência acima da media, possui uma enorme facilidade em analisar com precisão a personalidade de seus amigos. Guerreira, modesta, confiável, cautelosa, paciente, metódica e eficiente, cuida harmoniosamente cada detalhe, ao mesmo tempo é muito prática. Perfeccionista, quer tudo bem organizado e limpo. Muito discreta, amigável e divertida.';
            }
		}
		if ($signo == 'libra'){
            if ($sexo == 'M'){
			$retSigno = 'Com uma grande capacidade de fazer amigos sempre  procura novas aventuras. Simpática e encantador, está sempre em busca de harmonia e equilíbrio. Sempre com uma forte intuição, cauteloso, educado e gentil. Com um grande senso de justiça. Sempre sorridente, ao lado dele o mundo e belo.';
            }
             if ($sexo == 'F'){
			$retSigno = 'Com uma grande capacidade de fazer amigos sempre  procura novas aventuras. Simpática e encantadora, está sempre em busca de harmonia e equilíbrio. Sempre com uma forte intuição, cautelosa, educada e gentil. Com um grande senso de justiça. Sempre sorridente, ao lado dela o mundo e belo.';
            }
		}
		if ($signo == 'escorpiao'){
            if ($sexo == 'M'){
			$retSigno = 'Intenso, com uma intuição poderosa. Possui grande sensibilidade e compreende muito bem as situações e as pessoas. Tem ótima memória e uma personalidade muito forte, emotivo, determinado, valoriza muito a própria opinião. Não gosta de perder o controle de nada. É muito curioso quer saber como tudo funciona';
            }
             if ($sexo == 'F'){
			$retSigno = 'Intensa, com uma intuição poderosa. Possui grande sensibilidade e compreende muito bem as situações e as pessoas. Tem ótima memória e uma personalidade muito forte, emotiva, determinada, valoriza muito a própria opinião. Não gosta de perder o controle de nada. É muito curiosa quer saber como tudo funciona';
            }
		}
		if ($signo == 'sagitario'){
            if ($sexo == 'M'){
			$retSigno = 'Sempre de bem com a vida e um grande coração, otimista, amigável, aventureiro, tem capacidade de liderança e é amante da liberdade. Com uma personalidade forte, é uma pessoa  disciplinada, alegre, esta sempre em busca de novas amizades e de novos horizontes. Generoso, organizado, não suporta ver injustiças. Precisa sempre estar de bem consigo mesmo e com todo mundo.';
            }
             if ($sexo == 'F'){
			$retSigno = 'Sempre de bem com a vida e um grande coração, otimista, amigável, aventureira, tem capacidade de liderança e é amante da liberdade. Com uma personalidade forte, é uma pessoa  disciplinada, alegre, esta sempre em busca de novas amizades e de novos horizontes. Generosa, organizada, não suporta ver injustiças. Precisa sempre estar de bem consigo mesmo e com todo mundo.';
            }
		}
		if ($signo == 'capricornio'){
            if ($sexo == 'M'){
			$retSigno = 'Esta sempre tentando alcançar um determinado objetivo na vida, e dificilmente confia em outra pessoa para compartilhar os seus sonhos. É bastante realista, pé-no-chão, gosta de economizar dinheiro. Confiável, forte, reservado, organizado, cauteloso, paciente e conservador. Sua melhor característica é a persistência. Com uma criatividade e a imaginação invejável.';
            }
             if ($sexo == 'F'){
			$retSigno = 'Esta sempre tentando alcançar um determinado objetivo na vida, e dificilmente confia em outra pessoa para compartilhar os seus sonhos. É bastante realista, pé-no-chão, gosta de economizar dinheiro. Confiável, forte, reservada, organizada, cautelosa, paciente e conservadora. Sua melhor característica é a persistência. Com uma criatividade e a imaginação invejável.';
            }
		}
		if ($signo == 'aquario'){
            if ($sexo == 'M'){
			$retSigno = 'Ele é a alma da festa sua presença sempre deixa o ambiente mais divertido, pois gosta de fazer as pessoas rirem. Leal, inventivo, lógico, independente, determinado, com uma personalidade forte. Humanitária e idealista, possui a mente e a criatividade muito aguçadas.';
            }
             if ($sexo == 'F'){
			$retSigno = 'Ela é a alma da festa sua presença sempre deixa o ambiente mais divertido, pois gosta de fazer as pessoas rirem. Leal, inventiva, lógica, independente, determinada, com uma personalidade forte. Humanitária e idealista, possui a mente e a criatividade muito aguçadas.';
            }
		}
		if ($signo == 'peixes'){
            if ($sexo == 'M'){
			$retSigno = 'Sensitivo, psíquico, visionário, imaginativo, sensível, gentil, amável e caridoso, sereno, bastante sonhador e talentoso. É muito sentimental, prestativo, sempre se coloca no lugar do outro e sofre as dores de quem está ao seu redor. Só se sente bem quando consegue praticar o bem.';
            }
             if ($sexo == 'F'){
			$retSigno = 'Sensitiva, psíquica, visionária, imaginativa, sensível, gentil, amável e caridosa, serena, bastante sonhadora e talentosa. É muito sentimental, prestativa, sempre se coloca no lugar do outro e sofre as dores de quem está ao seu redor. Só se sente bem quando consegue praticar o bem.';
            }
		}
	$retorno = ucwords(strtolower($nome)).' é do signo de '.$signo.', 
	nasceu no dia '.$diaNascimento.' de '.$mesExtenso.' de '.$anoNascimento.' . Hoje está com 
	'.$interval->format( '%Y Anos' ).'. '.$retSigno;

	}
}		
echo'
<html>
<head>
<title>Personalidade de '.$nome.'</title>
<style type="text/css">img{border-radius: 20px;}</style>
</head>
<body>
<div align="center">'.$mostraFotos.'
	<h1 align="center">'.$nome.'</h1>
	<p align="justify" style="color:gray; font-family:verdana; font-size:16px" >'.$retorno.'</p>
    <a href="javascript:history.back()"> <img alt="Voltar a Pagina Principal" title="Voltar" src="./uploads/voltar.png" height="50"></a>
</div>
</body>
</html>
';
?>
