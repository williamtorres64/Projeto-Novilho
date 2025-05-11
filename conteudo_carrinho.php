<?php
session_start();
include_once("conexao.php");

$sql = "select uc.id as ucid, p.id as pid, quantidade, tq.tipo as tipo, observacao, p.nome as pnome, valor, nomeImagem from usuarioCarrinho uc
inner join produto p on p.id = uc.produtoId
inner join tipoQuantidade tq on tq.id = uc.tipoQuantidadeId
where usuarioId = ".$_SESSION['usuario_id'];

$resultado = mysqli_query($link, $sql);

if (mysqli_num_rows($resultado) == 0) {
    echo '<center><p>Seu carrinho está vazio.</p>';
    echo '<a href="index.php"><button class="botao">Voltar para a página inicial</button></a></center>';
} else {
    $valorTotal = 0;
    while ($rs = mysqli_fetch_assoc($resultado)) {
        $valorTotal += $rs['valor'] * $rs['quantidade'];
        if ($rs['tipo'] == "Inteiro") {
            $tipo = "unidade";
            $travarInteiro = 'onchange="this.value = parseInt(this.value);"';
            $placeholder = "0";
            $unidade = "unitário";
            if ($rs['quantidade'] != 1) {
                $nomeQuantidade = "Unidades";
            } else {
                $nomeQuantidade = "Unidade";
            }
            $step = "1";

            echo "<style>#observacao {display: none};</style>";
        } else if ($rs['tipo'] = "Decimal") {
            $tipo = "Kg";
            $travarInteiro = '';
            $placeholder = "0,0";
            $unidade = "Kg";
            $step = "0.1";
            $nomeQuantidade = "Kg";
        } else {
            $tipo = "Erro";
        }
        echo '
        <div class="item-carrinho">
            <div class="item-esquerda">
                <div class="imagem-produto">
                    <!-- Mostra a imagem do produto -->
                    <img src="' . htmlspecialchars($rs["nomeImagem"]) . '" alt="foto">
                </div>
                <div class="detalhes-produto">
                    <!-- Mostra título e informações FIXAS (não vem do banco) -->
                    <p class="nome-produto">' . $rs["pnome"] . '</p>
                    <p><strong>Quantidade</strong><br>' . $rs['quantidade'] . ' ' . $nomeQuantidade . '</p>
                    <p><strong>Valor ' . $unidade . ' </strong><br>R$ ' . $rs['valor'] . '</p>
                </div>
            </div>
            <div class="botoes">
                <!-- Botões que levam para páginas de edição/exclusão passando o ID -->
                <a href="removerCarrinho.php?ucid=' . $rs["ucid"] . '" class="botao remover">Remover</a>
            </div>
        </div>';
    }
    ?>
    <div class="rodape-carrinho">
        <p><strong>Valor total:</strong> R$<?php echo str_replace('.', ',', $valorTotal) ?></p>
        <div class="botoes-acao">
            <a href="index.php"class="botao">Continuar comprando</a>
            <a href="finalizacao.php"class="botao">Finalizar compra</a>
        </div>
    </div>
    <?php
}
?>

