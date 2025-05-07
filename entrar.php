<!DOCTYPE html>
<html lang="pt-BR">
<?php include_once("conexao.php"); // Conexão com banco de dados - idealmente deveria estar no body ou em arquivo separado ?>
<head>
    <!-- Configurações básicas da página -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novilho (Login)</title>
    <link rel="stylesheet" href="estilo.css"> <!-- Estilo principal -->
</head>
<body>
    <!-- Estrutura principal do layout -->
    <div id="geral">
        <!-- Cabeçalho -->
        <div id="topo"><?php include 'topo.php' ?></div>
        
        <!-- Área de conteúdo principal -->
        <div id="conteudo" class="cad">
            <div class="box_form">
                <!-- Título da página -->
                <h1 class="titulos" style="font-size:40px">Entrar / Login</h1>
                
                <!-- Formulário de login -->
                <form action="login.php" method="post" class="form"> <!-- Removido enctype desnecessário para login -->
                    <!-- Campo de usuário -->
                    <input type="text" name="email" class="campos_cad" 
                           placeholder="E-mail" required autofocus>
                    
                    <!-- Campo de senha -->
                    <input type="password" name="senha" class="campos_cad" 
                           placeholder="Senha" required>
                    
                    <!-- Botão de submit -->
                    <input type="submit" name="enviar" value="Entrar" class="campos_cad btn-login">
                </form>
            </div>
        </div>
        
        <!-- Rodapé -->
        <div id="rodape"><?php include 'rodape.php' ?></div>
    </div>
</body>
</html>