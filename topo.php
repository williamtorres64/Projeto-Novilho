<?php
// Inicia a sessão para armazenar dados do usuário
session_start();
if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == "Administrador") {
    $btnPainel = '<div class="user-controls">
        <a href="painel.php">Painel</a>
    </div>';
} else {
    $btnPainel = '';
}
;
// Inclui o arquivo de conexão com o banco de dados
include_once("conexao.php");
?>

<style>
    /* ===== Barra de pesquisa ===== */
    #search-bar {
        display: flex;
        justify-content: center;
        align-items: center;
        max-height: 36px;
    }
    #search-form {
        display: flex;
        align-items: center;              /* garante alinhamento vertical */
        max-height: 60px;
    }

    /* garante que borda/padding sejam considerados na altura */
    #search-input,
    #search-button{
        box-sizing: border-box;
    }

    #search-input {
        padding: 0 12px; /* remove padding vertical extra */
        border: 1px solid #ccc;
        border-radius: 20px 0 0 20px;
        outline: none;
        width: 250px;
        font-size: 14px;
        height: 38px; /* Alturas iguais */
    }

    #search-button {
        padding: 0 12px;                  /* remove padding vertical extra */
        border: none;
        background: #8b0000;
        color: #fff;
        border-radius: 0 20px 20px 0;
        cursor: pointer;
        font-size: 14px;
        transition: background .3s ease;
        display: flex; /* centraliza o ícone */
        align-items: center;
        justify-content: center;
        height: 38px; /* Alturas iguais */
    }
    #search-button:hover {
        background: #45a049;
    }
</style>

<!-- Cabeçalho da página -->
<header>
    <!-- Logo da empresa com link para a página inicial -->
    <div class="logo">
        <a href="index.php"><img src="imagens/logo.png" alt="logo"></a>
    </div>
    
    <!-- Link para o painel administrativo -->
    <?php echo $btnPainel ?>
    
    <!-- Barra de pesquisa -->
    <div id="search-bar">
        <form id="search-form" action="index.php" method="GET">
            <input id="search-input" type="text" name="pesquisa" placeholder="Pesquisar produtos...">
            <button id="search-button" type="submit">🔍️</button>
        </form>
    </div>
    <span style="margin-left: 10px;"><?php echo isset($_SESSION['usuario_nome']) ? $_SESSION['usuario_nome'] : '' ?></span>
    
    <!-- Controles do usuário -->
    <div class="user-controls">
        <a href="carrinho.php">Carrinho</a>
        <a href="cadCliente.php">Cadastro</a>
<?php
// Verifica se o usuário está logado
if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
    // Se o usuário estiver logado, exibe o botão de logout
    $btnLogOff = '<a href="logout.php">Sair</a>';
} else {
    // Se não estiver logado, exibe o botão de login
    $btnLogOff = '<a href="entrar.php">Entrar</a>';
}
echo $btnLogOff;
session_write_close();


?>
    </div>
</header>


