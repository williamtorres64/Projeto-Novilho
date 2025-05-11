<?php
include_once("conexao.php");

$sqlCategorias = "SELECT id, nome FROM categoria";
$resultadoCategorias = mysqli_query($link, $sqlCategorias);
?>

<!-- Menu de navegação principal -->
<nav class="menu-principal">
    <?php while ($categoria = mysqli_fetch_assoc($resultadoCategorias)): ?>
        <a href="index.php?cat=<?php echo $categoria['id']; ?>" class="item-menu">
            <?php echo $categoria['nome']; ?>
        </a>
    <?php endwhile; ?>
</nav>

