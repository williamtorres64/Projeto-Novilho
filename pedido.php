<!DOCTYPE html>
<!-- Declaração do tipo de documento HTML5 -->
<html lang="pt-BR">
<!-- Define o idioma da página como português do Brasil -->

<head>
    <!-- Meta tags básicas para configuração da página -->
    <meta charset="UTF-8"> <!-- Define a codificação de caracteres como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configura viewport para responsividade -->
    <title>Novilho Cortes</title> <!-- Título da página que aparece na aba do navegador -->
    <link rel="stylesheet" href="estilo.css"> <!-- Link para o arquivo CSS de estilos -->
</head>

<body>
   <!-- Container principal que envolve todo o conteúdo da página -->
   <div id="geral">
        <!-- Seção do cabeçalho -->
        <div id="topo">
            <?php include "topo.php"; ?> <!-- Inclui o arquivo PHP do cabeçalho -->
        </div>
        
        <!-- Seção de conteúdo principal -->
        <div id="conteudoPedido">
            <?php include "conteudo_pedido.php"; ?> <!-- Inclui o conteúdo específico de pedidos -->
        </div>
        
        <!-- Seção do rodapé -->
        <div id="rodape">
            <?php include "rodape.php"; ?> <!-- Inclui o arquivo PHP do rodapé -->
        </div>
    </div> 
</body>
</html>