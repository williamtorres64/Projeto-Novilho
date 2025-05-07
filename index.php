<!DOCTYPE html>
<html lang="pt-BR"> <!-- Idioma alterado para português do Brasil -->
<head>
    <!-- Configurações básicas do documento -->
    <meta charset="UTF-8"> <!-- Codificação de caracteres -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsividade -->
    <title>Novilho Cortes</title> <!-- Título da página -->
    <link rel="stylesheet" href="estilo.css"> <!-- Arquivo CSS principal -->
</head>
<body>
   <!-- Container principal da página -->
   <div id="geral">
        <!-- Seção do cabeçalho -->
        <div id="topo">
            <?php include "topo.php"; ?> <!-- Inclui o cabeçalho da página -->
        </div>
        
        <!-- Seção do menu de navegação -->
        <div id="menu">
            <?php include "menu.php"; ?> <!-- Inclui o menu principal -->
        </div>
        
        <!-- Conteúdo principal dinâmico -->
        <div id="conteudo">
            <?php include "conteudo_produto.php"; ?> <!-- Inclui o conteúdo específico -->
        </div>
        
        <!-- Rodapé da página -->
        <div id="rodape">
            <?php include "rodape.php"; ?> <!-- Inclui o rodapé -->
        </div>
    </div> 
</body>
</html>