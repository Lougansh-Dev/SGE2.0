<?php
function listarArquivos($diretorio) {
    if ($handle = opendir($diretorio)) {
        while (false !== ($arquivo = readdir($handle))) {
            if ($arquivo != "." && $arquivo != "..") {
                $caminho = $diretorio . '/' . $arquivo;
                $permissao = substr(sprintf('%o', fileperms($caminho)), -4);
                echo "Arquivo: $arquivo | Permissões: $permissao <br>";

                if (is_dir($caminho)) {
                    listarArquivos($caminho); // Chamada recursiva para listar os arquivos dentro do subdiretório
                }
            }
        }
        closedir($handle);
    }
}

// Diretório inicial
$diretorioInicial = '/var/www/html';

// Chamada inicial da função para listar arquivos e subdiretórios
listarArquivos($diretorioInicial);

?>
