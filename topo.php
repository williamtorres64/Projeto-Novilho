
<?php
session_start();
    include_once("conexao.php");

error_reporting(0);

$login = $_GET['login'];
    if (($login =='ok') ||($_SESSION['id'] > 0)) {
    $texto = "Seja bem vindo! " .$_SESSION['nome'];
    $btnLogOff = "<a href='logoff.php' class='link_top' style='background:red'>Sair</a>";
} else {
    $texto = "";
    $btnLogOff = "";
}
?>
<header>
    <div class="logo">logo</div>
    <div class="search-bar">
        <input type="text" placeholder="pesquisar"><button>🔍</button>
     </div>
     <span style="margin-left: 10px;">UserName</span>
     <div class="user-controls">
        <a href="#">Carrinho</a>
        <a href="#">Cadastro</a>
        <a href="#">Entrar</a>
    </div>
</header>

<div>

    <?php echo $btnLogOff; ?>
</div>
