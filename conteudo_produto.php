<?php
// Conexão com o banco de dados
include_once("conexao.php");

$where = '';
if (isset($_GET['cat'])) {
    $cat = (int)$_GET['cat'];
    $where = "WHERE prod.categoriaId = $cat";
} elseif (isset($_GET['pesquisa'])) {
    $pesquisa = mysqli_real_escape_string($link, $_GET['pesquisa']);
    $where = "WHERE prod.nome LIKE '%$pesquisa%' OR prod.descricao LIKE '%$pesquisa%'";
}

// Consulta SQL para buscar produtos
$sql = "SELECT prod.id id, prod.nome, valor, descricao, nomeImagem 
        FROM produto as prod
        INNER JOIN categoria cat ON cat.id = prod.categoriaId
        $where
        ORDER BY prod.nome";
$resultado = mysqli_query($link, $sql); // Executa a consulta
?>

<!-- Listagem de produtos -->
<?php while ($rs = mysqli_fetch_assoc($resultado)): ?>
    <section class="product">
        <!-- Título do produto -->
        <h2 class="product-title"><?= htmlspecialchars($rs["nome"]) ?></h2>
        
        <div class="product-box">
            <!-- Imagem do produto -->
            <div class="product-image">
                <img src="<?= htmlspecialchars($rs["nomeImagem"]) ?>" 
                     alt="<?= htmlspecialchars($rs["nome"]) ?>" 
                     style="height:100px">
            </div>
            
            <!-- Descrição e informações -->
            <div class="product-description">
                <p><?= htmlspecialchars($rs["descricao"]) ?></p>
                <!-- Valor do produto -->
                <span class="price">
                    R$<?= number_format($rs["valor"], 2, ',', '.') ?>
                </span>
            </div>
            
            <!-- Botão de ação -->
            <a class="buy-button" href="adicionaProd.php?id=<?= htmlspecialchars($rs['id']) ?>">Comprar</a>
        </div>
    </section>
<?php endwhile; ?>

