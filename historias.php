<!DOCTYPE html>
<html>
<head>
  <title>Minhas Histórias</title>
  <style>
    .historia {
      display: none;
    }
    .botao-navegacao {
      display: none;
    }
	.texto-historia {
      font-size: 16px;
	  margin: 0 20px; /* Adiciona margens esquerda e direita de 20 pixels */
    }
	body {
      font-size: 16px;
    }
  </style>
  <script>
    var historias = [];
    var indiceAtual = 0;

    function adicionarHistoria(id) {
      var historia = document.getElementById(id);
      historias.push(historia);
    }

    function exibirHistoria(indice) {
      var historiaAtual = historias[indiceAtual];
      var botaoAnterior = document.getElementById('botao-anterior');
      var botaoProximo = document.getElementById('botao-proximo');
      var tituloHistoria = document.getElementById('titulo-historia');

      historiaAtual.style.display = 'none';
      indiceAtual = indice;
      historiaAtual = historias[indiceAtual];

      historiaAtual.style.display = 'block';

      if (indiceAtual === 0) {
        botaoAnterior.style.display = 'none';
      } else {
        botaoAnterior.style.display = 'inline-block';
      }

      if (indiceAtual === historias.length - 1) {
        botaoProximo.style.display = 'none';
      } else {
        botaoProximo.style.display = 'inline-block';
      }

      tituloHistoria.innerHTML = historiaAtual.getAttribute('data-titulo');
    }

    function irParaAnterior() {
      if (indiceAtual > 0) {
        exibirHistoria(indiceAtual - 1);
      }
    }

    function irParaProximo() {
      if (indiceAtual < historias.length - 1) {
        exibirHistoria(indiceAtual + 1);
      }
    }
  </script>
</head>
<body>
  <h1 align="center">Minhas Histórias</h1>

  <div align="center">
    <div id="navegacao">
      <button class="botao-navegacao" id="botao-anterior" onclick="irParaAnterior()">Anterior</button>
      <span id="titulo-historia"></span>
      <button class="botao-navegacao" id="botao-proximo" onclick="irParaProximo()">Próximo</button>
    </div>
  </div>
  
  <div class="historia" id="historia1" data-titulo="<?php echo trim(file('./historia/historia1.txt')[0]); ?>">
  <!-- Conteúdo da História 1 -->
  <?php 
  $conteudo = file('./historia/historia1.txt');
  $titulo = trim($conteudo[0]);
  unset($conteudo[0]);
  ?>
  <hr align="center"></hr>
  <p align="justify" class="texto-historia"><?php echo implode('', $conteudo); ?></p>
  </div>
  
  <div class="historia" id="historia2" data-titulo="<?php echo trim(file('./historia/historia2.txt')[0]); ?>">
  <!-- Conteúdo da História 2 -->
  <?php 
  $conteudo = file('./historia/historia2.txt');
  $titulo = trim($conteudo[0]);
  unset($conteudo[0]);
  ?>
  <hr align="center"></hr>
  <p align="justify" class="texto-historia"><?php echo implode('', $conteudo); ?></p>
  </div>
  
  <div class="historia" id="historia3" data-titulo="<?php echo trim(file('./historia/historia3.txt')[0]); ?>">
  <!-- Conteúdo da História 3 -->
  <?php 
  $conteudo = file('./historia/historia3.txt');
  $titulo = trim($conteudo[0]);
  unset($conteudo[0]);
  ?>
  <hr align="center"></hr>
  <p align="justify" class="texto-historia"><?php echo implode('', $conteudo); ?></p>
  </div>
  
  <div class="historia" id="historia4" data-titulo="<?php echo trim(file('./historia/historia4.txt')[0]); ?>">
  <!-- Conteúdo da História 4 -->
  <?php 
  $conteudo = file('./historia/historia4.txt');
  $titulo = trim($conteudo[0]);
  unset($conteudo[0]);
  ?>
  <hr align="center"></hr>
  <p align="justify" class="texto-historia"><?php echo implode('', $conteudo); ?></p>
  </div>
  
  <div class="historia" id="historia5" data-titulo="<?php echo trim(file('./historia/historia5.txt')[0]); ?>">
  <!-- Conteúdo da História 5 -->
  <?php 
  $conteudo = file('./historia/historia5.txt');
  $titulo = trim($conteudo[0]);
  unset($conteudo[0]);
  ?>
  <hr align="center"></hr>
  <p align="justify" class="texto-historia"><?php echo implode('', $conteudo); ?></p>
  </div>
  
  <div class="historia" id="historia6" data-titulo="<?php echo trim(file('./historia/historia6.txt')[0]); ?>">
  <!-- Conteúdo da História 6 -->
  <?php 
  $conteudo = file('./historia/historia6.txt');
  $titulo = trim($conteudo[0]);
  unset($conteudo[0]);
  ?>
  <hr align="center"></hr>
  <p align="justify" class="texto-historia"><?php echo implode('', $conteudo); ?></p>
  </div>

  <div class="historia" id="historia7" data-titulo="<?php echo trim(file('./historia/historia7.txt')[0]); ?>">
  <!-- Conteúdo da História 7 -->
  <?php 
  $conteudo = file('./historia/historia7.txt');
  $titulo = trim($conteudo[0]);
  unset($conteudo[0]);
  ?>
  <hr align="center"></hr>

  <p align="justify" class="texto-historia"><?php echo implode('', $conteudo); ?></p>
  </div>
  
<div class="historia" id="historia8" data-titulo="<?php echo trim(file('./historia/historia8.txt')[0]); ?>">
  <!-- Conteúdo da História 8 -->
  <?php 
  $conteudo = file('./historia/historia8.txt');
  $titulo = trim($conteudo[0]);
  unset($conteudo[0]);
  ?>
  <hr align="center"></hr>
  <p align="justify" class="texto-historia"><?php echo implode('', $conteudo); ?></p>
  </div>

  <div class="historia" id="historia9" data-titulo="<?php echo trim(file('./historia/historia9.txt')[0]); ?>">
  <!-- Conteúdo da História 9 -->
  <?php 
  $conteudo = file('./historia/historia9.txt');
  $titulo = trim($conteudo[0]);
  unset($conteudo[0]);
  ?>
  <hr align="center"></hr>
  <p align="justify" class="texto-historia"><?php echo implode('', $conteudo); ?></p>
  </div>

  <div class="historia" id="historia10" data-titulo="<?php echo trim(file('./historia/historia10.txt')[0]); ?>">
  <!-- Conteúdo da História 10 -->
  <?php 
  $conteudo = file('./historia/historia10.txt');
  $titulo = trim($conteudo[0]);
  unset($conteudo[0]);
  ?>
  <hr align="center"></hr>
  <p align="justify" class="texto-historia"><?php echo implode('', $conteudo); ?></p>
  </div>

  <div class="historia" id="historia11" data-titulo="<?php echo trim(file('./historia/historia11.txt')[0]); ?>">
  <!-- Conteúdo da História 11 -->
  <?php 
  $conteudo = file('./historia/historia11.txt');
  $titulo = trim($conteudo[0]);
  unset($conteudo[0]);
  ?>
  <hr align="center"></hr>
  <p align="justify" class="texto-historia"><?php echo implode('', $conteudo); ?></p>
  </div>

  <script>
    adicionarHistoria('historia1');
    adicionarHistoria('historia2');
    adicionarHistoria('historia3');
    adicionarHistoria('historia4');
    adicionarHistoria('historia5');
    adicionarHistoria('historia6');
    adicionarHistoria('historia7');
    adicionarHistoria('historia8');
    adicionarHistoria('historia9');
    adicionarHistoria('historia10');
    adicionarHistoria('historia11');

    exibirHistoria(0);
  </script>
</body>
</html>
