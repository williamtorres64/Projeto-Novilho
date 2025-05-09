<?php
session_start();
if ($_SESSION['logado'] !== true) {
    header("Location: entrar.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novilho Cortes</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div id="geral">
<!-- TODO: caso não haja nada no carrinho escrever que o carrinho esta vazio e mostrar somente o botao de voltar para a pagina inicial -->
        <!-- Topo da página -->
        <div id="topo">
            <?php include "topo.php"; ?>
        </div>

        <!-- Conteúdo principal da página (o carrinho de compras) -->
        <div id="conteudo"><br>
        <center><h1 class="titulos" style="font-size:32px">Carrinho</h1></center><br>
            <?php include "conteudo_carrinho.php"; ?>
        </div>

        <!-- Rodapé -->
        <div id="rodape">
            <?php include "rodape.php"; ?>
        </div>

    </div> 
</body>
</html>
