<?php
// Inicia a sessão para armazenar dados do usuário
session_start();

// Inclui o arquivo de conexão com o banco de dados
include_once("conexao.php");

?>

<!-- Cabeçalho da página -->
<header>
    <!-- Logo da empresa com link para a página inicial -->
    <div class="logo">
        <a href="index.php"><img src="imagens/Beef.png" alt="Beef"></a>
    </div>
    
    <!-- Link para o painel administrativo -->
    <div class="user_contrls">
        <a href="painel.php">Painel</a>
    </div>
    
    <!-- Barra de pesquisa -->
    <div class="search-bar">
        <input type="text" placeholder="pesquisar">
        <button>🔍</button>
    </div>
    
    <!-- Espaço para nome do usuário (atualmente estático) -->
    <span style="margin-left: 10px;">UserName</span>
    
    <!-- Controles do usuário -->
    <div class="user-controls">
        <a href="carrinho.php">Carrinho</a>
        <a href="cadCliente.php">Cadastro</a>
        <a href="entrar.php">Entrar</a>
    </div>
</header>

<!-- Área que exibe o botão de logout (se usuário estiver logado) -->
<div>
    <?php echo $btnLogOff; ?>
</div>
