<?php
// Conecta ao banco e busca todas as postagens
include_once("conexao.php");
$sql = "SELECT id, titulo, imagem FROM postagens"; // Seleciona dados básicos
$resultado = mysqli_query($link, $sql);

// Para cada postagem encontrada...
while ($post = mysqli_fetch_assoc($resultado)) {
    echo '
    <div class="item-carrinho">
        <div class="item-esquerda">
            <div class="imagem-produto">
                <!-- Mostra a imagem do produto -->
                <img src="'.htmlspecialchars($post["imagem"]).'" alt="foto">
            </div>
            <div class="detalhes-produto">
                <!-- Mostra título e informações FIXAS (não vem do banco) -->
                <p class="nome-produto">'.htmlspecialchars($post["titulo"]).'</p>
                <p><strong>Quantidade</strong><br>1,00kg</p>
                <p><strong>Valor kg</strong><br>R$ 65,00</p>
            </div>
        </div>
        <div class="botoes">
            <!-- Botões que levam para páginas de edição/exclusão passando o ID -->
            <a href="regProduto.php?id='.$post["id"].'" class="botao editar">Editar</a>
            <a href="remover.php?id='.$post["id"].'" class="botao remover">Remover</a>
        </div>
    </div>';
}
?>

<!-- Rodapé FIXO do carrinho (não muda) -->
<div class="rodape-carrinho">
    <p><strong>Valor total:</strong> R$</p> <!-- Total vazio (deveria ser calculado) -->
    <div class="botoes-acao">
        <!-- Botões para continuar comprando ou finalizar -->
        <button class="botao continuar"><a href="index.php">Continuar comprando</a></button>
        <button class="botao finalizar"><a href="finalizacao.php">Finalizar compra</a></button>
    </div>
</div>