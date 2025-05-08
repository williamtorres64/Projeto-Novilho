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
$nome = $_SESSION['usuario_nome']
;
// Inclui o arquivo de conexão com o banco de dados
include_once("conexao.php");

?>

<!-- Cabeçalho da página -->
<header>
    <!-- Logo da empresa com link para a página inicial -->
    <div class="logo">
        <a href="index.php"><img src="imagens/logo.png" alt="logo"></a>
    </div>
    
    <!-- Link para o painel administrativo -->
    <?php echo $btnPainel ?>
    
    <!-- Barra de pesquisa -->
    <div class="search-bar">
        <input type="text" placeholder="pesquisar">
        <button>🔍️</button>
    </div>
    
    <!-- Espaço para nome do usuário (atualmente estático) -->
    <span style="margin-left: 10px;"><?php echo $nome ?></span>
    
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

