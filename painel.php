

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metadados básicos da página -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novilho (Painel)</title>
    <!-- Link para o arquivo CSS -->
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <!-- Container principal da página -->
    <div id="geral">
        <!-- Seção do topo (incluída de arquivo externo) -->
        <div id="topo">
            <?php include 'topo.php' ?>
        </div>
        <br>
        <!-- Conteúdo principal centralizado -->
        <div id="conteudo" class="cad">
            <center>
                <!-- Título da página -->
                <h1 class="titulos" style="font-size:40px">Painel</h1><br>
                <!-- Links/botões para outras páginas -->
                <div><a href="regProduto.php" class="link_top1"><button>Cadastro Produto</button></a></div>
                <div><a href="pedido.php" class="link_top1"><button>Tela de Pedidos</button></a></div>  
            </center>
        </div>
        <!-- Rodapé (incluído de arquivo externo) -->
        <div id="rodape">
            <?php include 'rodape.php' ?>
        </div>
</body>

</html>